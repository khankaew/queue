<?php
    include("dbConnect.php");

    $name = $_POST['Name'];
    $hospital_id = $_POST['HospitalId'];
    $id_card = $_POST['IdCard'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $date_queue = $_POST['DateQueue'];
    $time_begin = $_POST['TimeQueue'];
    $category = $_POST['Category'];

    $timeBegin = strtotime("+0 minutes", strtotime($time_begin));
    $time_begin = date('h:i:s', $timeBegin);

    $timeEnd = strtotime("+20 minutes", strtotime($time_begin));
    $time_end = date('h:i:s', $timeEnd);

    echo $time_begin.' - '.$time_end.'<br />';
    // ห้ามจองล่วงหน้าไม่เกิน 7 วัน
    $datetime1 = date_create(date('Y-m-d')); // date cuurent
    $datetime2 = date_create($date_queue);
    $interval = date_diff($datetime1, $datetime2);
    if ($interval->invert == 0 && $interval->days < 8) { // วันที่ปัจจุบันหรืออนาคต && ไม่เกิน 7 วัน
        // ตรวจสอบช่วงเวลา
        $duplicate = true;
        $sql_check = "SELECT * FROM cue WHERE dateQue='$date_queue' AND cateID=$category";
        $result_check = mysqli_query($connectDB, $sql_check);
        while ($row = mysqli_fetch_array($result_check,MYSQLI_ASSOC)) {
            $_timeBegin = DateTime::createFromFormat('H:i:s', $time_begin);
            $_timeEnd = DateTime::createFromFormat('H:i:s', $time_end);
            $db_timeBegin = DateTime::createFromFormat('H:i:s', $row['timeBegin']);
            $db_timeEnd = DateTime::createFromFormat('H:i:s', $row['timeEnd']);

            if (($_timeBegin>=$db_timeBegin && $_timeBegin<=$db_timeEnd) || ($_timeEnd>=$db_timeBegin && $_timeEnd<=$db_timeEnd)){
                 $duplicate = false; // ซ้ำ
                 break;
            }
      }

      if ($duplicate) {
        $sql = "INSERT INTO cue VALUES ('Null',
                                        '$name',
                                        '$hospital_id',
                                        '$id_card',
                                        '$address',
                                        '$phone',
                                        '$date_queue',
                                        '$time_begin',
                                        '$time_end',
                                        '$category',
                                        'จองคิว'
                                      )";
        $connectDB->query($sql);

        echo ("<script language='JavaScript'>
                  window.alert('จองคิวเรียบร้อย');
                  window.location.href='index.php';
               </script>");
      }else {
        echo ("<script language='JavaScript'>
                  window.alert('ช่วงเวลาที่ท่านจองไม่ว่าง กรุณาเลือกเวลาใหม่');
                  window.location.href='index.php';
               </script>");
      }
    }else { // pass
      echo "date fail";
      echo ("<script language='JavaScript'>
                window.alert('วันที่ไม่ถูกต้อง กรุณาทำรายการใหม่');
                window.location.href='index.php';
             </script>");
    }

 ?>
