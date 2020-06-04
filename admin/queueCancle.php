<?php
    include("../dbConnect.php");

    $id = $_GET['Id'];

    $sql = "UPDATE cue SET status='ยกเลิก' WHERE id='$id'";
    $connectDB->query($sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
 ?>
