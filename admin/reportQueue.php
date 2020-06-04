<?php
include('../dbConnect.php');
$Cate = $_POST['Cate'];
$Date = $_POST['Date'];
require_once __DIR__ . '/../vendor/autoload.php';

$html = '
    <html>
    <head>
    <style>
    body {font-family: garuda;
    	font-size: 10pt;
    }
    table{
      border-collapse: collapse;
      width: 100%;
      margin: 10px;
    }
    tr th, table tr td {
      border: 1px solid black;
    }
    </style>
    </head>
';
$html .= '
    <body>
        <div style="text-align:center">
            <h2>รายงานการจองคิว</h2>
        </div>
';
    $sql_cate = "SELECT * FROM category WHERE cateId=$Cate";
    $result_cate = mysqli_query($connectDB, $sql_cate);
    while ($row_cate = mysqli_fetch_array($result_cate,MYSQLI_ASSOC)) {
      $html .= '<div>ประเภทการให้บริการ <b>'.$row_cate['cateName'].'</b> <span style="text-align:right">วันที่ <b>'.$Date.'</b></span> </div>';
    }
    $html .= '<table>
                <thead>
                    <tr>
                      <th style="width:4%">คิว</th>
                      <th style="width:14%">ชื่อ-สกุล</th>
                      <th style="width:17%">เลขประจำตัวโรงพยาบาล</th>
                      <th style="width:15%">เลขประจำตัวประชาชน</th>
                      <th style="width:18%">ที่อยู่</th>
                      <th style="width:10%">เบอร์โทร</th>
                      <th style="width:8%">วันที่จอง</th>
                      <th style="width:8%">เวลา</th>
                      <th style="width:6%">สถานะ</th>
                    </tr>
                </thead>
                <tbody>';
                $num = 1;
                $sqlQue = "SELECT * FROM cue
                            INNER JOIN category ON cue.cateID = category.cateId
                            WHERE dateQue='$Date'
                            AND cue.cateID=$Cate
                            ORDER BY timeBegin ASC";
                $result = mysqli_query($connectDB, $sqlQue);
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    $html .= '
                        <tr>
                            <td>'.$num++.'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['idHospital'].'</td>
                            <td>'.$row['idCard'].'</td>
                            <td>'.$row['address'].' '.$row['phone'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td>'.$row['dateQue'].'</td>
                            <td>'.$row['timeBegin'].' - '.$row['timeEnd'].'</td>
                            <td>'.$row['status'].'</td>
                        </tr>
                    ';
                }
    $html .= '</tbody>
            </table>';

$html .= '</body></html>';


$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->WriteHTML($html);
$mpdf->Output('report', 'I');
