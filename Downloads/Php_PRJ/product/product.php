<?php
   $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    $img_src = $_POST["product"];

    $sql = "select * from product_img where img_path = '../".$img_src."'";
    $result = mysqli_query($conn, $sql);
    while($re = mysqli_fetch_array($result)) {
        $product_id = $re[0];
    }

    $sql = "select * from product_info where id=".$product_id;
    $result = mysqli_query($conn, $sql);
    while($re = mysqli_fetch_array($result)) {
        $product_name = $re[1];
    }

    $sql = "select * from product_info where id=".$product_id;
    $result = mysqli_query($conn, $sql);
    while($re = mysqli_fetch_array($result)) {
        $product_price = $re[2];
    }


?>

<html>
    <head>
        <meta charset = "utf-8">
        <title><?php echo $product_name; ?></title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">

        <style type = "text/css">
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 40px;}
            #mini_logo {float : left;}
            div#search {width : 220px; height : 23px; border : 1.5px solid orange; border-radius : 50px; margin-top: 7px; display : inline-block;}
            input#search_text {width : 160px; height : 20px; border : 0px; outline : none; margin-left : 10px; margin-top : 2px; float:left;}
            button#searchbtn {border : 0px; outline : none; float : right; margin-right : 10px; background-color : white; margin-top : 3px;}
            ul#list {margin-right : 100px; list-style : none; display: inline; float : right;}
            li { float : left; list-style : none; margin-left : 20px; font-size : 14px;}

            section {width:60%; height:850px; margin-left:20%; margin-top : 100px;}
            section p {margin-left : 110px;}
            section button {width : 320px; height : 80px; margin-left : 100px; margin-top : 40px; background-color : orange; border : 0px; color : white; font-size : 26px;}
        </style>
    </head>

    <body>
        <header>
            <a href="../index.php"><image id = "logo" src = "../img/small_logo.png" width = 25px height = 25px></image></a>
            <div id = search>
                <form method = "post" action = "../product/product_search.php">
                    <input id = "search_text" type="text" name = "search">
                    <button id = "searchbtn" type = "submit"><image src = "../img/searchbtn.jpg" width = 18px height = 18px></image></button>
                <form method = "post" action = "product_search.php">
            </div>
    
            <ul id = "list">
                <a href = "join.html"><li> 회원가입 </li></a>
                <a href = "login.html"><li> 로그인 </li></a>
                <li> 고객센터 </li>
            </ul> 

            <hr width=100%; size=2px; color = "orange"; style = "margin-top : 40px;">
        </header>

        <section>
            <image src = <?php echo "../".$img_src; ?> style = "width : 800px; height : 500px; margin-left : 110px;"></image>
            <p style = "font-size : 40px; font-weight : bold;"> <?php echo $product_name; ?> </p>
            <p style = "font-size : 34px;"> <?php echo $product_price."원"; ?> </p>
            <form method = "post" action = "../user/cart.php">
                <button type = "submit" value = <?php echo $product_id; ?> name = "name_product" style = "margin-left : 140px;">장바구니</button>
                <button>구매</button>
            </form>


        </section>

    </body>
</html>