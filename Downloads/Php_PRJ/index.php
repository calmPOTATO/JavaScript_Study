<?php
    $conn = mysqli_connect('localhost', 'mall', '1111', 'shopingmall');
    session_start();
?>


<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
        <meta charset = "utf-8"> 
        <title>O'market!</title>

        <style>
            body {font-family: 'Nanum Gothic', sans-serif;}
            header {width : 100%; height : 170px;}
            header #logo { width : 200px; height : 70px; float : left; margin-left : 250px; margin-top : 15px; }
            header .search_box {width : 500px; height : 40px; border : 3px solid orange; display : inline-block; margin-top : 30px; margin-left : 10px; border-radius: 50px;}
            header #search {width : 400px; height : 35px;float : left; border : 0px; outline: none;margin-left : 15px; margin-top: 2px;}
            header #searchbtn {margin-left : 20px; background-color: white; border : 0px; outline : none; margin-top : 2px;}
            header #header_promote {margin-left : 40px; margin-top : 15px; display: inline-block;}
            header #categoryimg{width : 250px; height : 70px; position:absolute; top : 100px; left : 260px; margin-left : 10px; float : left;} 
            header button {margin-left : 10px; display: inline-block; background-color : white; border : 0px; margin-top : 10px;}
            header ul {margin-top : 40px;}
            header li {float : left; list-style: none; margin-left : 30px;}
            .managerbtn {border : 1px solid black; width : 90px; height : 40px; position : absolute; top : 30px; border-radius : 15px; background-color : rgb(210, 210, 210);}

            nav #category_nav {width : 100%; height : 70px;}
            #category button {width : 200px; height : 60px; margin-left : 5px; font-size : 16px; border : 0px; background-color : white; border-right : 1px solid gray;}
           
            nav #promote_nav {width : 100%; height : 500px; position: relative; margin : 0; padding : 0;}
            #food {position : relative; left : 590px; }
            #food li {list-style : none; border : 1px solid gray; width : 200px; text-align : center; height : 50px;}
            #computer {position : absolute; left : 805px; top : 238px;}
            #computer li {list-style : none; border : 1px solid gray; width : 200px; text-align : center; height : 50px;}
            #promote_nav button {width : 200px; border : 0px; height : 50px;}
            nav #promote {width : 100%; height : 500px; position : absolute;}
            div #category {width : 100px; height : 500px; position : relative; top : 100px; border : 1px solid red;}

            section {width : 70%; height : 1400px; margin-top : 30px; margin-left : 15%;}
            section #popular_product {width : 100%; height : 500px; position : absolute; top : 800px;}
            #popular_product .best_img {width:220px; height:220px; border-radius: 100px;}
            section #popular_product button {font-size : 24px; text-align: center; width : 290px; height : 350px; margin-left : 70px; margin-top : 50px; background-color : white; border : 1px solid gray; border-radius : 20px;}
            section #bigsale {height : 500px; background-color : rgb(235, 235, 235); position : absolute; top : 1400px; width : 65%; margin-left : 15px;}
            section #bigsale_inner {width : 90%; height : 80%; margin-top : 3%; margin-left : 5%; background-color: white; }
            #bigsale button {width : 210px; height : 210px; margin-left : 105px; background-color : white; border : 0px;}
            .sale_img {width : 200px; height : 200px; border-radius : 100px;}
            section #home_product {height : 500px; position : absolute; top : 2000px; left : 0px;}
            .home_img {width:210px; height:210px; margin-left : 60px; border-radius : 20px;}
            .slider img {margin : 0 auto;}

            footer {width : 100%; height : 300px; background-color :  rgb(235, 235, 235); margin-top : 50px; position : absolute; top : 2500px;}
            div#list {width : 80%; height : 50px; margin-left : 10%; border-bottom : 1px solid gray;}
            div#list li {float : left; list-style : none; color : gray; padding-left : 30px;}
            div#intro {width : 80%; margin-left : 10%; border-bottom : 1px solid gray; font-size : 12px;}
            div#list li:hover {color :black;}

        </style>
    </head>


    <body>
        <header>
            <image id = "logo" src = "img/main_logo.png"></image>
            <div class = "search_box">
                <form method = "post" action = "product/product_search.php">
                    <input id = "search" type = "text" name = "search">
                    <button id = "searchbtn" type = "submit"><image src = "img/searchbtn.jpg" width = 35px height = 35px></image></button>
                </form>
            </div>

            <image id = "header_promote" src = "img/header_promote.png"></image>

            <?php session_start(); if($_SESSION['userID']=="manager") { ?>
                <button class = "managerbtn" style = "margin-left : 100px;" onclick = "location.href='manager/manage_product.html'">상품 등록</button>
                <button class = "managerbtn" style = "margin-left : 210px;" onclick = "location.href='manager/show_user.php'">회원 목록</button>
            <?php } else { ?>
                <button name = "best_img_src" type = "button" style = "margin-left : 50px;" onclick = "location.href='user/mypage.php'"><image src = "img/mypage.jpg" width=45px; height=45px;></image></button>
                <button name = "best_img_src" type = "button" onclick = "location.href='main.html')"><image src = "img/last_product.jpg" width=45px; height=45px;></image></button>
                <button name = "best_img_src" type = "button" onclick = "location.href='main.html'"><image src = "img/cart.jpg" width=45px; height=45px;></image></button>
            <?php } ?>

            <?php
                session_start();
                if(!$_SESSION['userID']) { ?>
                    <ul>
                        <a href ="login.html"><li style = "margin-left : 1180px;">로그인</li></a>
                        <a href="user/join.html"><li>회원가입</li></a>
                        <li>고객센터</li>
                    </ul>
            <?php } else { ?>
                    <ul>
                        <li style = "margin-left : 1200px; color : orange; font-weight : bold; "><?php echo $_SESSION['userID']."님"; ?></li>
                        <a href = "logout.php"><li>로그아웃</li></a>
                        <li>고객센터</li>
                    </ul>
            <?php } ?>

        </header>

        <nav id = "category_nav">
            <div id = "category">
                <form method = "post" action = "product/product_category.php">
                    <button type = "submit" id = "c1" value = "브랜드 패션" name = "category" style = "border-left : 1px solid gray;">브랜드 패션</button>
                    <button type = "submit" id = "c2" value = "패션·잡화·뷰티" name = "category">패션·잡화·뷰티</button>
                    <button type = "submit" id = "c3" value = "유아동" name = "category">유아동</button>
                    <button type = "submit" id = "c4" value = "식품·생필품" name = "category">식품·생필품</button>
                    <button type = "submit" id = "c5" value = "컴퓨터·디지털·가전" name = "category">컴퓨터·디지털·가전</button>
                    <button type = "submit" id = "c6" value = "스포츠·건강·렌탈" name = "category">스포츠·건강·렌탈</button>
                    <button type = "submit" id = "c7" value = "자동차·공구" name = "category">자동차·공구</button>
                    <button type = "submit" id = "c8" value = "여행·도서·티켓·e쿠폰" name = "category">여행·도서·티켓·e쿠폰</button>
                <form>
            </div>

        </nav>

        <nav id = "promote_nav">
            <div id = "promote">
                <img class = "mySlides" src = <?php echo $_SESSION['main_1']; ?> style = width:100% height = 100%>
                <img class = "mySlides" src = <?php echo $_SESSION['main_2']; ?> style = width:100% height = 100%>
                <img class = "mySlides" src = <?php echo $_SESSION['main_3']; ?> style = width:100% height = 100%>
                <img class = "mySlides" src = <?php echo $_SESSION['main_4']; ?> style = width:100% height = 100%>
            </div>

                <ul id = food>
                    <form method = "post" action = "product_category.php">
                        <li><button type = "submit" name = "category" value = "식품">식품</button></li>
                        <li><button type = "submit" name = "category" value = "생필품">생필품</buton></li>
                    </form>
                </ul>

                <ul id ="computer">
                    <li><button>컴퓨터</button></li>
                    <li><button>디지털</button></li>
                    <li><button>가전</button></li>
                </ul>
        </nav>

        <section>
            <div id = "popular_product">
                <p style = "font-size : 30px; font-weight: bold; position : relative; top : 5px; left : 15px;"> 지금 제일 잘 나가는 상품</p>
                <form method = "post" action = "product/product.php">
                    <button type = "submit" value = <?php echo $_SESSION['best_1']?> name = "product">
                        <image class = "best_img" src = <?php echo $_SESSION['best_1']?>></image>
                        <p><?php echo $_SESSION['best_name1']?></p>
                        <p><?php echo $_SESSION['best_price1']?></p>
                    </button>
                    <button type = "submit" value = <?php echo $_SESSION['best_2']?> name = "product">
                        <image class = "best_img" src = <?php echo $_SESSION['best_2']?>>
                        <p><?php echo $_SESSION['best_name2']?></p>
                        <p><?php echo $_SESSION['best_price2']?></p>
                    </button>
                    <button type = "submit" value = <?php echo $_SESSION['best_3']?> name = "product">
                        <image class = "best_img" src = <?php echo $_SESSION['best_3']?>>
                        <p><?php echo $_SESSION['best_name3']?></p>
                        <p><?php echo $_SESSION['best_price3']?></p>
                    </button>
                </form>
            </div>


            <div id = "bigsale">
                    <p style = "font-size : 30px; font-weight: bold; position : relative; top : 15px; left : 15px;">해외 직구</p>
                    <div id = "bigsale_inner">
                        <p style = "text-align: center; color: gray; font-size: 20px; position : relative; top : 40px;">1년을 기다린 빅세일!</p>
                        <p style = "text-align: center; font-size: 46px; position : relative; top : 5px;">BLACK SALE</p>
                        <form method = "post" action = "product/product.php">
                            <button type = "submit" value = <?php echo $_SESSION['sale_1']?> name = "product">
                                <image src = <?php echo $_SESSION['sale_1']; ?>  class = "sale_img"></image>
                            </button>
                            <button> <image src = <?php echo $_SESSION['sale_2']; ?>  class = "sale_img"></image> </button>
                            <button> <image src = <?php echo $_SESSION['sale_3']; ?>  class = "sale_img"></image> </button>
                        </form>
                    </div>
            </div>

           <div id = "home_product">
            <div class = "slider">
                <div><img src = <?php echo $_SESSION['home_1']?>></div>
                <div><img src = <?php echo $_SESSION['home_2']?>></div>
                <div><img src = <?php echo $_SESSION['home_3']?>></div>
                <div><img src = <?php echo $_SESSION['home_4']?>></div>
                <div><img src = <?php echo $_SESSION['home_5']?>></div>
            </div>
            </div>
            
        </section>

        <footer>
            <hr width = 100%  size = 7 color = "orange"/>
            <div id = "list">
                <ul>
                    <li> O마켓 소개 </li>
                    <li> 채용 정보 </li>
                    <li> 이용 약관 </li>
                    <li> 개인정보처리방침 </li>
                    <li> 청소년보호정책 </li>
                    <li> 전자금융거래약관 </li>
                    <li> 제휴 , 광고 </li>
                </ul>
            </div>

            <div id = "intro">
                <p>2020 PHP 수행평가 </p>
                <p>서울시 관악구 호암로 546 업무진행자 : 한나래 </p>
                <p>사업자등록번호 : 2217-2003-12-09 </p>
                <p>Fax : 02-02-2217 </p>
            </div>

        </footer>

    </body>

    <script>
        var slideIndex = 0;
            carousel();
    
            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > x.length) {slideIndex = 1}
                x[slideIndex-1].style.display = "block";
                setTimeout(carousel, 1500); // Change image every 2 seconds
            }
    </script>

    <script>
        $(document).ready(function() {
            $(".slider").bxSlider();
        });
    </script>

    <script type = "text/javascript">
        $(document).ready(function() {
            $("#food").hide();
            $("#computer").hide();

            $("#c4").hover(function(){
                $('#food').show();
            });
            $('#c4').mouseout(function() {
                $('#food').fadeOut(1500);
            });

            $("#c5").hover(function(){
                $('#computer').show();
            });
            $('#c5').mouseout(function() {
                $('#computer').fadeOut(1500);
            });

        });
    </script>

</html>


