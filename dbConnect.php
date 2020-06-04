<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $dbname = "queue";
    $connectDB = mysqli_connect($hostname, $user, $password, $dbname) or die("Error");

    mysqli_set_charset($connectDB, "utf8");

?>
