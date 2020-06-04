<?php include('dbConnect.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ระบบจองคิว</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="assets/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">ระบบจองคิว</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin">เจ้าหน้าที่</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>ระบบจองคิว</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="card">
      <div class="card-header">
        กรอกข้อมูลเพื่อจองคิว
      </div>
      <div class="card-body">
        <form action="db_cueInsert.php" method="post">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">ชื่อ-สกุล</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">เลขประจำตัวบัตรโรงพยาบาล</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="HospitalId" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">เลขบัตรประจำตัวประชาชน</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="IdCard" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">ที่อยู่</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="Address" rows="2" cols="80" required></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">เบอร์โทรศัพท์</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="Phone" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">วันที่ต้องการตรวจ</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="DateQueue" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">เวลาที่ต้องการตรวจ <span style="font-size:12pt">*ล่วงหน้าไม่เกิน 7 วัน</span> </label>
            <div class="col-sm-8">
              <input type="time" class="form-control" name="TimeQueue" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">ใช้บริการประเภท</label>
            <div class="col-sm-8">
              <select class="form-control" name="Category">
                <?php
                  $sql = "SELECT * FROM category ORDER BY cateId ASC";
                  $result = mysqli_query($connectDB, $sql);
                  $num_row = 1;
                  while ($rowCate = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                ?>
                  <option value="<?php echo $rowCate['cateId'] ?>"><?php echo $rowCate['cateName'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-success">จองคิว</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <hr>
  <br>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="assets/js/clean-blog.min.js"></script>

</body>

</html>
