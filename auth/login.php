<?php
    include("../dbConnect.php");
    session_start();

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // isAdmin: 1=admin 0=user

    $strSQL = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connectDB, $strSQL);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["isAdmin"] = $row['isAdmin'];
        }
        session_write_close();
        header("location: ../admin");
    }else {
      echo ("<script language='JavaScript'>
                window.alert('ชื่อผู้ใช้หรือรหัสผ่าน ไม่ถูกต้อง');
                window.location.href='../login_page.php';
             </script>");
    }

 ?>
