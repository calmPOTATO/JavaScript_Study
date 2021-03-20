<?php 
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    session_start();


    $id = $_POST['u_id'];
    $pw = $_POST['u_pw'];
    $chk_pw = $_POST['chk_pw'];
    $name = $_POST['u_name'];
    $tel = $_POST['tel_1']. $_POST['u_tel'];
    $email = $_POST['email'].$_POST['email_t'];

    $sql = "select userid from user where userid='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    
    if($row) {
        echo "<script>alert(\"중복된 아이디입니다. 다시 설정하세요.\");</script>";
        echo "<script>location.replace('join_form.html')</script>";
    } else {
        if($pw == $chk_pw) {
            $sql = "insert into user(userid, pw, username, tel, email) values
                ('$id', '$pw', '$name', '$tel', '$email')";
            mysqli_query($conn, $sql);
            echo "가입이 완료되었습니다.";
            echo "<script>location.replace('join_final.html')</script>";
        } else {
            echo "<script>alert(\"비밀번호가 다릅니다.\");</script>";
            echo "<script>location.replace('join_form.html')</script>";
        }
    }
    

?>