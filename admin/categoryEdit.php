<?php include 'header.php'; ?>

  <div class="container-fluid">
    <br>
    <div class="alert alert-primary">
      <h4>ประเภทการให้บริการ</h4>
    </div>

    <div class="card">
      <div class="card-header">
        แก้ไข
      </div>
      <div class="card-body">
        <?php
          $id = $_GET['Id'];
          $sql = "SELECT * FROM category WHERE cateId=$id";
          $result = mysqli_query($connectDB, $sql);
          $num_row = 1;
          while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        ?>
        <form action="db_categoryUpdate.php" method="get">
          <input type="number" name="Id" value="<?php echo $row['cateId'] ?>" hidden>
          <div class="form-row">
            <div class="col-10">
              <input type="text" class="form-control" name="Name" value="<?php echo $row['cateName'] ?>" placeholder="ประเภทการให้บริการ..." required>
            </div>
            <div class="col-1">
              <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
            </div>
            <div class="col-1">
              <a href="category.php">
                <button type="button" class="btn btn-danger btn-block">ยกเลิก</button>
              </a>
            </div>
          </div>
        </form>
      <?php } ?>
      </div>
    </div>

    <br>
  </div>

  <br>

<?php include 'footer.php'; ?>
