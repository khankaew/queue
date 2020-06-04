<?php
    include("../dbConnect.php");

    $name = $_POST['Name'];
    $position = $_POST['Position'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $sql = "INSERT INTO user VALUES ('Null', '$name', '$position', '$address', '$phone', '$username', '$password', '0')";
    $connectDB->query($sql);

    header('Location: user.php');
 ?>
