<?php
    session_start();
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    for($i = 0; $i<count($_POST["main_product"]); $i++) {
        $main_product = $_POST["main_product"];

        $sql = "select * from product_img where id=".$main_product[$i];
        $result = mysqli_query($conn, $sql);

        while($re = mysqli_fetch_array($result)) {
            $main_src[$i] = substr($re[4], 3);
        }
    }

    $_SESSION['main_1'] = $main_src[0];
    $_SESSION['main_2'] = $main_src[1];
    $_SESSION['main_3'] = $main_src[2];
    $_SESSION['main_4'] = $main_src[3];

    for($i = 0; $i<count($_POST["best_product"]); $i++) {
        $best_product = $_POST["best_product"];
        $sql = "select * from product_img where id=".$best_product[$i];
        $sql2 = "select * from product_info where id=".$best_product[$i];
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        while($re = mysqli_fetch_array($result)) {
            $best_src[$i] = substr($re[4], 3);
        }
        while($re2 = mysqli_fetch_array($result2)) {
            $best_name[$i] = $re2[1];
            $best_price[$i] = $re2[2];
        } 
    }

    $_SESSION['best_1'] = $best_src[0];
    $_SESSION['best_2'] = $best_src[1];
    $_SESSION['best_3'] = $best_src[2];
    $_SESSION['best_4'] = $best_src[3];

    $_SESSION['best_name1'] = $best_name[0];
    $_SESSION['best_name2'] = $best_name[1];
    $_SESSION['best_name3'] = $best_name[2];
    $_SESSION['best_name4'] = $best_name[3];

    $_SESSION['best_price1'] = $best_price[0];
    $_SESSION['best_price2'] = $best_price[1];
    $_SESSION['best_price3'] = $best_price[2];
    $_SESSION['best_price4'] = $best_price[3];

    for($i = 0; $i<count($_POST["sale_product"]); $i++) {
       $sale_product = $_POST["sale_product"];

       $sql = "select * from product_img where id=".$sale_product[$i];
        $result = mysqli_query($conn, $sql);

        while($re = mysqli_fetch_array($result)) {
            $sale_src[$i] = substr($re[4], 3);
        }
    }

    $_SESSION['sale_1'] = $sale_src[0];
    $_SESSION['sale_2'] = $sale_src[1];
    $_SESSION['sale_3'] = $sale_src[2];

    for($i = 0; $i<count($_POST["home_product"]); $i++) {
       $home_product = $_POST["home_product"];

       $sql = "select * from product_img where id=".$home_product[$i];
        $result = mysqli_query($conn, $sql);

        while($re = mysqli_fetch_array($result)) {
            $home_src[$i] = substr($re[4], 3);
        }
    }

    $_SESSION['home_1'] = $home_src[0];
    $_SESSION['home_2'] = $home_src[1];
    $_SESSION['home_3'] = $home_src[2];
    $_SESSION['home_4'] = $home_src[3];
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>메인 상품 설정</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">

        <style type = "text/css">
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 100px; border-bottom : 3px solid orange;}
            header #logo {width : 200px; height : 70px; float : left; margin-left : 150px; margin-top : 20px}
            header ul {margin-left : 1200px;}
            header li {float : left; list-style : none; margin-left : 25px; margin-top : 60px;}
            .managerbtn {border : 1px solid black; width : 90px; height : 40px; position : absolute; top : 50px; left:1200px; border-radius : 15px; background-color : rgb(210, 210, 210);}

            section {width : 60%; height : 500px; border : 1px solid #EAEAEA; margin-left : 20%; margin-top: 100px; border-radius : 20px; background-color : #EAEAEA;} 
            section p{font-size : 32px; color : orange; font-weight : bold; text-align : center; padding-top : 100px;}    
            section button{width : 200px; height : 80px; background-color : orange; border : 0px; font-size : 20px; color : white; margin-top : 80px; margin-left : 70px;}   
        </style>
    </head>

    <body>
        <header>
            <a href = "../index.php"><image id = "logo" src = "../img/main_logo.png"></image></a>
            <button class = "managerbtn" style = "margin-left : 100px;" onclick = "location.href='manage_product.html'">상품 관리</button>
            <button class = "managerbtn" style = "margin-left : 210px;" onclick = "location.href='manage_user.php'">회원 조회</button>
        </header>  
        
        <section>
            <p>메인 상품이 설정이 완료되었습니다.</p>
            <button type = "button" onclick = "location.href='../main.php'" style = "margin-left : 250px;">메인화면</button>
            <button type = "button" onclick = "location.href='setMainproduct_form.php'">다시 설정</button>
        </section>
    </body>
</html>
