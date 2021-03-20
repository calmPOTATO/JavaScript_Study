<?php 
    session_start();
    $managerID = "manager";
    $managerPW = "1234";

    $now_id = $_POST['u_id'];
    $now_pw = $_POST['u_pw'];

    if($now_id==$managerID && $now_pw==$managerPW) {
        $_SESSION['userID'] = $now_id;
        $_SESSION['userPW'] = $now_pw;
        
        echo "<script>location.replace('../index.php')</script>";
    } else {
        echo "<script>alert(\"아이디 혹은 비밀번호가 틀렸습니다\");</script>";
        echo "<script>location.replace('../login.html')</script>";
    }


?>