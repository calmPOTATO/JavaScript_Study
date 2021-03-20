<?php 
    session_start();

    if($_SESSION['userID']) {
        unset($_SESSION['userID']);
        unset($_SESSION['userPW']);
        echo "<script>location.replace('index.php')</script>";
    }
?>
     