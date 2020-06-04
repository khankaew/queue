<?php
    include("../dbConnect.php");

    $id = $_POST['Id'];
    $name = $_POST['Name'];
    $position = $_POST['Position'];
    $address = $_POST['Address'];
    $phone = $_POST['Phone'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $sql = "UPDATE user SET name='$name', position='$position', address='$address', phone='$phone', username='$username', password='$password' WHERE id='$id'";
    $connectDB->query($sql);

    header('Location: user.php');
 ?>
