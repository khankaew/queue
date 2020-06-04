<?php include 'header.php'; ?>

  <div class="container-fluid">
    <br>
    <div class="alert alert-primary">
      <h4>จัดการผู้ใช้งาน</h4>
    </div>

    <div class="card">
      <div class="card-header">
        เพิ่มผู้ใช้งาน
      </div>
      <div class="card-body">
        <form action="db_userInsert.php" method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ตำแหน่ง</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Position" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ที่อยู่</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="Address" rows="2" cols="80" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Phone" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">ชื่อผู้ใช้</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Username" required>
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
              <button type="submit" class="btn btn-primary">เพิ่ม</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <br>
    <div class="card">
      <div class="card-header">
        ประเภทการให้บริการ
      </div>
      <div class="card-body">
        <table id="tbl_user" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อ-สกุล</th>
              <th>ตำแหน่ง</th>
              <th>ที่อยู่</th>
              <th>เบอร์โทรศัพท์</th>
              <th>ชื่อผู้ใช้</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM user ORDER BY id ASC";
              $result = mysqli_query($connectDB, $sql);
              $num_row = 1;
              while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
            <tr>
              <td><?php echo $num_row++ ?></td>
              <td style="width:20%"><?php echo $row['name'] ?></td>
              <td><?php echo $row['position'] ?></td>
              <td><?php echo $row['address'] ?></td>
              <td><?php echo $row['phone'] ?></td>
              <td style="width:10%"><?php echo $row['username'] ?></td>
              <td>
                <a href="userEdit.php?Id=<?php echo $row['id'] ?>">
                  <button type="button" class="btn btn-warning btn-block">แก้ไข</button>
                </a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

<?php include 'footer.php'; ?>
