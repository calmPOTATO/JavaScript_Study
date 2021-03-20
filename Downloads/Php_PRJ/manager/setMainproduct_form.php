<?php 
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    $sql = "select * from product_info";
    $result = mysqli_query($conn, $sql);
?>

<html>
    <head>
        <script src = "http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            section {width : 60%; height : 1200px; border : 1px solid #EAEAEA; margin-left : 20%; margin-top: 100px; border-radius : 20px; background-color : #EAEAEA;}
            .p1 {font-size : 30px; font-weight : bold; color : orange; margin-left : 20px; margin-top : 40px;}
            input {margin-left : 30px;}
            button {width : 200px; height : 60px; border : 0px; background-color : orange; color : white; position : relative; top : 550px; left : 30px;}

        </style>
    </head>


    <body>
        <header>
            <a href = "../index.php"><image id = "logo" src = "../img/main_logo.png"></image></a>
            <button class = "managerbtn" style = "margin-left : 100px;" onclick = "location.href='manage_product.html'">상품 관리</button>
            <button class = "managerbtn" style = "margin-left : 210px;" onclick = "location.href='manage_user.php'">회원 목록</button>
        </header>    

        <section>
           
            <form method = "post" action = "setMainproduct.php">
            <p class = "p1">메인 슬라이드(4가지 선택)</p>
                <?php 
                     while($re = mysqli_fetch_row($result)) {
                        $id = $re[0];
                        $name = $re[1];

                        if($id == 6) {
                            echo "<br>";
                        } ?>    

                        <input id="main" type = "checkbox" name = main_product[] value=<?php echo $id ?> > <?php echo $name?>
                <?php } 
                $result = mysqli_query($conn, $sql);
                ?>

            <p class = "p1">지금 가장 잘나가는 상품(3가지 선택)</p>
                <?php 
                     while($re = mysqli_fetch_row($result)) {
                        $id = $re[0];
                        $name = $re[1]; 
                        if($id == 6) {
                            echo "<br>";
                        } ?>       
                        <input id="best" type = "checkbox" name = best_product[] value=<?php echo $id ?>> <?php echo $name?>
                <?php } 
                 $result = mysqli_query($conn, $sql);
                ?>

            <p class = "p1">빅세일(3가지 선택)</p>
                <?php 
                   while($re = mysqli_fetch_row($result)) {
                    $id = $re[0];
                    $name = $re[1]; 
                    if($id == 6) {
                        echo "<br>";
                    } ?>       
                        <input id="sale" type = "checkbox" name = sale_product[] value=<?php echo $id ?>> <?php echo $name?>
                <?php } 
                 $result = mysqli_query($conn, $sql);
                ?>

            <p class = "p1">홈쇼핑 상품(5가지 선택)</p>
                <?php 
                   while($re = mysqli_fetch_row($result)) {
                    $id = $re[0];
                    $name = $re[1]; 
                    if($id == 6) {
                        echo "<br>";
                    } ?>         
                        <input id="home" type = "checkbox" name = home_product[] value=<?php echo $id ?>> <?php echo $name?>
                <?php } ?>

                <button type = "submit">완료</button>
            </form>
        </section>
    </body>

    <script>
        $(document).ready(function() {
            $("input:checkbox[id=main]").on("click", function() {
                var count = $("input:checkbox[id=main]:checked").length;

                if(count > 4) {
                    $(this).attr("disabled", "disabled");
                    alert("4개까지만 선택 가능합니다.")
                }
            });

            $("input:checkbox[id=best]").on("click", function() {
                var count = $("input:checkbox[id=best]:checked").length;

                if(count > 3) {
                    $(this).attr("disabled", "disabled");
                    alert("3개까지만 선택 가능합니다.")
                }
            });

            $("input:checkbox[id=sale]").on("click", function() {
                var count = $("input:checkbox[id=sale]:checked").length;

                if(count > 3) {
                    $(this).attr("disabled", "disabled");
                    alert("3개까지만 선택 가능합니다.")
                }
            });

            $("input:checkbox[id=home]").on("click", function() {
                var count = $("input:checkbox[id=home]:checked").length;

                if(count > 5) {
                    $(this).attr("disabled", "disabled");
                    alert("5개까지만 선택 가능합니다.")
                }
            });
        });
    </script>




</html>