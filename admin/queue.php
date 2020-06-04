<?php
  include 'header.php';
  $date = date('Y-m-d');
?>

  <div class="container-fluid">
    <br>
    <div class="alert alert-primary">
      <h4>การจองคิว</h4>
    </div>

    <div class="card">
      <div class="card-body">
        <form action="queueSerach.php" method="get">
            <div class="form-row">
              <div class="col-4">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">ประเภทการให้บริการ</div>
                  </div>
                  <select class="form-control" name="Cate" >
                    <?php
                      $sqlCate = "SELECT * FROM category ORDER BY cateId ASC";
                      $resultCate = mysqli_query($connectDB, $sqlCate);
                      while ($row = mysqli_fetch_array($resultCate,MYSQLI_ASSOC)) {
                    ?>
                      <option value="<?php echo $row['cateId'] ?>"><?php echo $row['cateName'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-2">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">วันที่</div>
                  </div>
                  <input type="date" class="form-control" name="Date" value="<?php echo $date ?>"  required>
                </div>
              </div>

              <div class="col-1">
                <button type="submit" class="btn btn-primary" onclick="submitReport()">ค้นหา</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <br>
    <div class="card">
      <div class="card-header">
        ข้อมูลการจองคิว

        <button type="button" class="btn btn-info" style="float:right" onclick="submitReport()">พิมพ์รายงาน</button>
      </div>
      <div class="card-body">
        <table id="tbl_queue" class="table table-bordered">
          <thead>
            <tr>
              <th>คิว</th>
              <th>ชื่อ-สกุล</th>
              <th>เลขประจำตัวบัตรโรงพยาบาล</th>
              <th>เลขบัตรประจำตัวประชาชน</th>
              <th>ที่อยู่</th>
              <th>วันที่จอง</th>
              <th>เวลา</th>
              <th>สถานะ</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $cue_order = 1;
              $sqlQue = "SELECT * FROM cue
                          INNER JOIN category ON cue.cateID = category.cateId
                          WHERE dateQue='$date'
                          AND cue.cateID=1
                          ORDER BY timeBegin ASC";
              $resultQue = mysqli_query($connectDB, $sqlQue);
              while ($row = mysqli_fetch_array($resultQue,MYSQLI_ASSOC)) {
            ?>
            <tr>
              <td><?php echo $cue_order++ ?></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['idHospital'] ?></td>
              <td><?php echo $row['idCard'] ?></td>
              <td><?php echo $row['address'] ?> <?php echo $row['phone'] ?></td>
              <td><?php echo $row['dateQue'] ?></td>
              <td><?php echo $row['timeBegin'].' - '.$row['timeEnd'] ?></td>
              <td><?php echo $row['status'] ?></td>
              <td>
                <?php if ($row['status'] == 'จองคิว'): ?>
                  <button type="button" class="btn btn-danger" onclick="_confirm(<?php echo $row['id'] ?>)">ยกเลิก</button>
                <?php else: ?>
                  <button type="button" class="btn btn-danger" disabled>ยกเลิก</button>
                <?php endif; ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

  <form action="reportQueue.php" id="frmReport" method="post" target="_blank">
      <input type="number" name="Cate" id="inpCate" value="1" hidden>
      <input type="date" name="Date" id="inpDate" value="<?php echo date('Y-m-d') ?>" hidden>
  </form>

  <script type="text/javascript">
      // function setCate(id) {
      //   document.getElementById('inpCate').value = id;
      // }
      // function setDate(date) {
      //   document.getElementById('inpDate').value = date;
      // }
      function submitReport() {
        document.getElementById('frmReport').submit();
      }

      function _confirm(id){
          if(confirm('ยืนยันการยกเลิก')){
              window.location.href = 'queueCancle.php?Id='+id;
          }
      }
  </script>
<?php include 'footer.php'; ?>
