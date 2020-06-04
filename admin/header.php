<?php
  session_start();
  if ($_SESSION['id']) {
    include("../dbConnect.php");
  }else {
    header("location:../login_page.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ระบบจองคิว - Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/simple-sidebar.css" rel="stylesheet">
  <!-- Data Table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <a href="../index.php">ระบบจองคิว</a>
      </div>
      <div class="list-group list-group-flush">
        <?php if ($_SESSION['isAdmin'] == 1): ?>
          <a href="user.php" class="list-group-item list-group-item-action bg-light">จัดการผู้ใช้งาน</a>
          <a href="category.php" class="list-group-item list-group-item-action bg-light">ประเภทการให้บริการ</a>
        <?php endif; ?>
        <a href="queue.php" class="list-group-item list-group-item-action bg-light">การจองคิว</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#"><?php echo $_SESSION['username'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
