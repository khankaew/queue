<?php
    include("../dbConnect.php");

    $name = $_GET['Name'];

    $sql = "INSERT INTO category VALUES ('Null', '$name')";
    $connectDB->query($sql);

    header('Location: category.php');
 ?>
