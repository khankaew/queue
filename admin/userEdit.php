<?php include 'header.php'; ?>

  <div class="container-fluid">
    <br>
    <div class="alert alert-primary">
      <h4>จัดการผู้ใช้งาน</h4>
    </div>

    <div class="card">
      <div class="card-header">
        แก้ไขข้อมูลผู้ใช้งาน
      </div>
      <div class="card-body">
        <?php
          $id = $_GET['Id'];
          $sql = "SELECT * FROM user WHERE id=$id";
          $result = mysqli_query($connectDB, $sql);
          $num_row = 1;
          while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        ?>
        <form action="db_userUpdate.php" method="post">
          <input type="number" name="Id" value="<?php echo $row['id'] ?>" hidden>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Name" value="<?php echo $row['name'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ตำแหน่ง</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Position" value="<?php echo $row['position'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ที่อยู่</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="Address" rows="2" cols="80" required><?php echo $row['address'] ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Phone" value="<?php echo $row['phone'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Username" value="<?php echo $row['username'] ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">รหัสผ่าน</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="Password" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
          </div>
        </form>
      <?php } ?>
      </div>
    </div>

  </div>
  <br>

<?php include 'footer.php'; ?>
