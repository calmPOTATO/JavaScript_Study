

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

            section {width : 90%; height : 900px; margin-left : 5%; background-color: #e8e8e8;}
            #form {width : 45%; height : 500px; background-color: white; margin-left : 27%; margin-top : 100px;}
            #p1 {font-size: 25px; text-align: center; color: rgb(82, 82, 82); padding-top: 40px;}
            #form input {width : 100%; height : 70px; border :0px; border-bottom: 1px solid gray;}
            #form #first_tel{width : 15%; height : 70px; float:left; border : 0px; border-bottom : 1px solid gray; border-right: 1px solid gray;}
            #form #tel {width : 85%;}
            #form #email {width : 60%; float : left;}
            #form #email_type {width:40%; height : 70px;  border : 0px; border-bottom : 1px solid gray; border-left : 1px solid gray;}
            #form button {width : 250px; height : 80px; margin-left : 50px; margin-top : 50px; border : 0px; background-color:  orange; color : white;}

        </style>
    </head>

    <body>
        <header>
            <a href = "../index.php"><image id = "logo" src = "../img/main_logo.png"></image></a>
            <div id = "search">
                <form method = "post" action = "../product/product_search.php">
                    <input type = "text" name = "search" style = "float: left; width: 300px; height : 35px; margin-left : 10px; margin-top : 8px; outline : none; border : 0px;">
                    <button type = "submit" style = "background-color: white; margin-left : 85px; border : 0px; margin-top : 10px;">
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
            <div id = form>
                <form method = "post" action = "updateInfo2.php">
                    <p id="p1">개인정보 수정</p>
                    <input type = "text" name = "u_id" placeholder = "아이디 입력">
                    <input type = "text" name = "u_pw" placeholder = "변경할 비밀번호 입력">
                    <input type = "text" name = "chk_pw" placeholder = "위의 비밀번호를 다시 입력해주세요.">
                    <input type = "text" name = "u_name" placeholder = "이름">
                    <div>
                        <select id = "first_tel" name = "tel_1">
                            <option value = "010">010</option>
                            <option value = "011">011</option>
                            <option value = "016">016</option>
                            <option value = "017">017</option>
                            <option value = "018">018</option>
                            <option value = "019">019</option>
                        </select>
    
                        <input type = "text" name = "u_tel" placeholder="전화번호" id = "tel">
                    </div>
    
                    <div>
                        <input type = "text" name = "email" placeholder="이메일" id = "email">
                        <select id = "email_type" name = "email_t">
                            <option value = "">직접입력</option>
                            <option value = "@naver.com">naver.com</option>
                            <option value = "@daum.net">daum.net</option>
                            <option value = "@nate.com">nate.com</option>
                            <option value = "@hanmail.net">hanmail.net</option>
                            <option value = "@yahoo.co.kr">yahoo.co.kr</option>
                        </select>
                    </div>
                    <button type = "submit" id = "updatebtn">수정하기</button>
                    <button type = "button" onclick = "location.href='../main.php'" id = "deletebtn">취소</button>
                </form>
            </div>

            
        </section>


    </body>

</html>