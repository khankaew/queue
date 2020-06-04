<?php include 'header.php'; ?>

  <div class="container-fluid">
    <br>
    <div class="alert alert-primary">
      <h4>ประเภทการให้บริการ</h4>
    </div>

    <div class="card">
      <div class="card-header">
        เพิ่ม
      </div>
      <div class="card-body">
        <form action="db_categoryInsert.php" method="get">
          <div class="form-row">
            <div class="col-10">
              <input type="text" class="form-control" name="Name" placeholder="ประเภทการให้บริการ..." required>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">เพิ่ม</button>
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
        <table id="tbl_category" class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ประเภทการให้บริการ</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM category ORDER BY cateId ASC";
              $result = mysqli_query($connectDB, $sql);
              $num_row = 1;
              while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            ?>
            <tr>
              <td><?php echo $num_row++ ?></td>
              <td><?php echo $row['cateName'] ?></td>
              <td>
                <a href="categoryEdit.php?Id=<?php echo $row['cateId'] ?>">
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
