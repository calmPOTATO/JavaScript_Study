<?php 
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    session_start();

    $now_id = $_POST['u_id'];
    $now_pw = $_POST['u_pw'];
    $remember_id = $_POST['rememberID'];

    $sql = "select * from user where userid='$now_id' and pw='$now_pw'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    if($row) {
        $_SESSION['userID'] = $row['userid'];
        $_SESSION['userPW'] = $row['pw'];
        echo "<script>location.replace('../index.php')</script>";
    } else {
        echo "<script>alert(\"아이디 혹은 비밀번호가 틀렸습니다\");</script>";
        echo "<script>location.replace('../login.html')</script>";
    } 

?>