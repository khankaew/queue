<?php
    include("../dbConnect.php");

    $id = $_GET['Id'];
    $name = $_GET['Name'];

    $sql = "UPDATE category SET cateName='$name' WHERE cateId='$id'";
    $connectDB->query($sql);

    header('Location: category.php');
 ?>
