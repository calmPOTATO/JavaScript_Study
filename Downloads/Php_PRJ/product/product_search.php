<?php 
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    $search_name = $_POST['search'];
    $sql = "select * from product_info where name like '%".$search_name."%'";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
        <meta charset = "utf-8">
        <title></title>
        <style tyoe = "text/css">
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 50px;}
            #mini_logo {float : left;}
            div#search {width : 450px; height : 30px; border : 1.5px solid orange; border-radius : 50px; margin-top: 7px; display : inline-block;}
            input#search_text {width : 380px; height : 20px; border : 0px; outline : none; margin-left : 10px; margin-top : 2px; float:left;}
            button#searchbtn {border : 0px; outline : none; float : right; margin-right : 10px; background-color : white; margin-top : 3px;}
            ul#list {margin-right : 100px; list-style : none; display: inline; float : right;}
            li { float : left; list-style : none; margin-left : 20px; font-size : 14px;}

            section {width : 70%; height : 1000px; margin-left : 15%; margin-top : 100px;}
            section p {float : left; margin-left : 150px; font-size : 18px; margin-top : 30px;}
            section td {background-color : white; border : 0px; outline : 0px; border-bottom : 1px solid gray;}
            section button {background-color : white; border : 0px; outline : 0px;}

        </style>
    </head>


    <body>
        <header>
            <a href="../index.php"><image id = "logo" src = "../img/small_logo.png" width = 30px height = 30px></image></a>
            <div id = search>
                <form method = "post" action = "../product/product_search.php">
                    <input id = "search_text" type="text" name = "search">
                    <button id = "searchbtn" type = "submit"><image src = "../img/searchbtn.jpg" width = 20px height = 20px></image></button>
                </form>
            </div>
    
            <ul id = "list">
                <a href = "join.html"><li> 회원가입 </li></a>
                <a href = "login.html"><li> 로그인 </li></a>
                <li> 고객센터 </li>
            </ul> 
            <hr width=100%; size=2px; color = "orange"; style = "margin-top : 30px;">
        </header>

        <section>
            <p style = "margin-left : 0px; font-size : 20px; margin-top : 0px;"><?php echo $search_name."의 검색 결과입니다."; ?></p>
            <hr width=100%; size=2px; color = "gray">
            <table style = "margin-top : 50px;">

            <?php 
                while($re = mysqli_fetch_row($result)) {
                    $id = $re[0];
                    $sql2 = "select * from product_img where id=".$id;
                    $result2 = mysqli_query($conn, $sql2);
                    while($re2 = mysqli_fetch_row($result2)) {
                        $img_src = $re2[4];
                    }
                    $name = $re[1];
                    $price = $re[2];
                    $category = $re[3];
                ?>   
                <form method = "post" action = "product.php"> 
                    <tr>
                        <td style = "width : 200px; height : 150px;">
                            <button type = "submit" value = <?php echo substr($img_src, 3); ?> name = "product" style = "width : 1150px;">
                                <image src = <?php echo $img_src; ?> style = "width : 100px; height : 100px; margin-left : 50px; float : left;"></image>
                                <p><?php echo $name; ?></p>
                                <p><?php echo $price; ?></p>
                                <p><?php echo $category; ?></p>
                            </button>
                        </td>
                    </tr>
                </form>

            <?php } ?>

            </table>
        </section>


    </body>

</html>