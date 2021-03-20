<?php 
    session_start();

    if(!$_SESSION['userID']) {
        echo "<script>alert(\"로그인이 필요한 기능입니다. 로그인 해주세요.\");</script>";
        echo "<script>location.replace('../login.html')</script>";
    }
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>마이페이지</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">

        <style type = "text/css">
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 150px;}
            header #logo {float : left; margin-left : 250px; margin-top : 20px; width : 150px; height : 50px;}
            header #search {float : left; width : 450px; height : 50px; border : 1.5px solid orange; display: inline-block; margin-top : 20px; border-radius: 50px; margin-left : 25px;}
            #mybtn {margin-top : 25px; float : left; margin-left : 400px;}
            #mybtn button {border : 0px; background-color : white; padding-right: 70px; width : 70px;}
            header #list_1 li {float: left; list-style: none; padding-right : 25px; margin-top : 20px;}
            #list_2 {float : left; margin-left : 280px;}
            #list_2 li {float: left; list-style: none; margin-left : 30px;}
            
            nav {width : 90%; height : 120px; background-color : #e8e8e8; margin-left : 5%;}
            nav li { float : left; margin-left : 20px; font-size : 20px; list-style : none; margin-top : 65px; color : orange; font-weight: bold;}

            section {width : 90%; height : 700px; margin-left : 5%; background-color: #e8e8e8;}
            section #info {width : 80%; height : 600px; margin-left : 10%; background-color : white; margin-top : 50px;}
            section button {width : 250px; height : 60px; background-color: orange; color: white; font-weight: bold; font-size : 24px; border: 0px;}
            section #updatebtn { position: absolute; top:800px; left : 570px; }
            section #deletebtn { position: absolute; top:800px; left : 900px;}
        </style>
    </head>

    <body>
        <header>
            <a href= "../index.php"><image id = "logo" src = "../img/main_logo.png"></image></a>
            <div id = "search">
                <form method = "post" action = "../product/product_search.php">
                    <input type = "text" name = "search" style = "float: left; width: 300px; height : 30px; margin-left : 10px; outline : none; border : 0px;">
                    <button type = "submit" style = "background-color: white; margin-left : 85px; border : 0px;">
                        <image src = "../img/searchbtn.jpg" style = "width: 30px; height : 30px;"></image>
                    </button>
                </form>
            </div>

            <div id = "mybtn">
                <button type = "button"><image src = "../img/mypage.jpg" width = 50px height = 50px></image></button>
                <button type = "button"><image src = "../img/last_product.jpg" width = 50px height = 50px></image></button>
                <button type = "button"><image src = "../img/cart.jpg" width = 50px height = 50px></image></button>
            </div>

            <button type = "button" style = "width : 160px; height : 60px; margin-left : 250px; float : left;background-color: white; border : 0px; ">
                <image src = "../img/menu.jpg" style = "float: left; width : 40px; height : 40px; margin-top : 8px;"></image>
                <p style = "font-size: 16px;">전체 카테고리</p>
            </button>

            <ul id = "list_2">
                <li style = "color : orange; font-weight : bold; margin-left : 560px;">
                    <?php session_start();
                    echo $_SESSION['userID']."님";
                    ?>
                </li>
                <a href = "logout.php"><li>로그아웃</li></a>
                <li>고객센터</li>
            </ul>

            <hr width = 90% aling = center  size = 3 color = "orange"/>
        </header>

        <nav>
            <image style = "float : left; margin-left : 220px; margin-top : 25px;"src = "../img/mypage_logo.png" width = 125px; height = 70px;></image>
            <ul>
                <li style = "margin-left : 60px; border-right : 0px;">나의 정보</li>
                <li style = "padding-left : 20px;">내가 쓴 글</li>
            </ul>
        </nav>

        <section>
            <hr width = 100% aling = center  size = 2 color = "#e8e8e8"/>
            <div id = info>
                <p style = "font-size : 48px; font-weight: 600; position: relative; top:40px; left : 40px; color : orange">
                    <?php session_start();
                    echo $_SESSION['userID']."님";
                    ?> 정보
                </p>

                <?php 
                $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
                session_start();
                $u_id = $_SESSION['userID'];

                $sql = "select * from user where userid='$u_id'";

                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                if($row) {
                    $u_name = $row['username'];
                    $u_tel = $row['tel'];
                    $u_email = $row['email'];

                    echo "<p style = 'font-size : 20px; margin-top : 100px; margin-left : 100px; color : gray'>"."이름 : ".$u_name."</p>";
                    echo "<p style = 'font-size : 20px; margin-top : 50px; margin-left : 100px; color : gray'>"."아이디 : ".$_SESSION['userID']."</p>";
                    echo "<p style = 'font-size : 20px; margin-top : 50px; margin-left : 100px; color : gray'>"."전화번호 : ".$u_tel."</p>";
                    echo "<p style = 'font-size : 20px; margin-top : 50px; margin-left : 100px; color : gray'>"."이메일 : ".$u_email."</p>";
                }        
                ?>
            </div>

            <button type = "button" id = "updatebtn" onclick = "location.href='updateInfo.php'">수정하기</button>
            <button type = "button" id = "deletebtn">탈퇴하기</button>
        </section>
    </body>
</html>


