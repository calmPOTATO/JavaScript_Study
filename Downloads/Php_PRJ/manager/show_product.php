<?php 
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');

    $sql = "select * from product_info";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>상품 조회</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">

        <style type = "text/css">
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 100px; border-bottom : 3px solid orange;}
            header #logo {width : 200px; height : 70px; float : left; margin-left : 150px; margin-top : 20px}
            header ul {margin-left : 1200px;}
            header li {float : left; list-style : none; margin-left : 25px; margin-top : 60px;}
            .managerbtn {border : 1px solid black; width : 90px; height : 40px; position : absolute; top : 50px; left:1200px; border-radius : 15px; background-color : rgb(210, 210, 210);}

            section {width : 60%; height : 1000px; border : 1px solid #EAEAEA; margin-left : 20%; margin-top: 100px; border-radius : 20px; background-color : #EAEAEA;}
            #product_category {position : absolute; top : 250px; left : 400px; }
            .product_category_td {text-align: center; font-size : 22px; color : orange; font-weight: bold; 
            border-right : 2px solid orange;}
            td {color : #353535; font-size : 18px;}

        </style>
    </head>


    <body>
        <header>
            <a href = "../index.php"><image id = "logo" src = "../img/main_logo.png"></image></a>
            <button class = "managerbtn" style = "margin-left : 100px;" onclick = "location.href='manage_product.html'">상품 관리</button>
            <button class = "managerbtn" style = "margin-left : 210px;" onclick = "location.href='manage_user.php'">회원 목록</button>
        </header>    

        <section>
            <table>
                <tr id = "product_category">
                    <td class = "product_category_td" style = "padding-left: 50px; padding-right : 25px;"> 번호 </td>
                    <td class = "product_category_td" style = "padding-left: 95px; padding-right : 95px;"> 상품명 </td>
                    <td class = "product_category_td" style = "padding-left: 50px; padding-right : 50px;"> 가격 </td>
                    <td class = "product_category_td" style = "padding-left: 70px; padding-right : 70px;"> 카테고리 </td>
                    <td class = "product_category_td" style = "padding-left: 50px; padding-right : 40px;"> 수량 </td>
                </tr>
            <hr width = 80% size = 2 color = "orange" style = "margin-top : 70px;">

            <?php 
                while($re = mysqli_fetch_row($result)) {
                    $num = $re[0];
                    $name = $re[1];
                    $price = $re[2];
                    $category = $re[3];
                    $number = $re[4];
                ?>    
                <tr>
                    <td style = "width : 50px; padding-left :115px;"><?php echo $num; ?></td>
                    <td style = "width : 240px; text-align : center;" ><?php echo $name; ?></td>
                    <td style = "width : 135px; text-align : center;"><?php echo $price; ?></td>
                    <td style = "width : 210px; text-align : center;"><?php echo $category; ?></td>
                    <td style = "width : 130px; text-align : center;"><?php echo $number; ?></td>
                </tr>

            <?php } ?>




            </table>
        </section>



    </body>
</html>