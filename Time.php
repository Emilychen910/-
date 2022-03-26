<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <!-- body從第340行開始 -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>永和豆漿</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link rel="icon" href="LOGO3.ico" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/8e919f91e0.js" crossorigin="anonymous"></script>
    <style>
        /*CSS*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        h1 {
            color: #C72828;
            font-size: 2.5rem;
        }

        h2 {
            color: #C72828;
            font-size: 1.5rem;
        }

        h4 {
            color: black;
            font-size: 1rem;
        }

        h5 {
            color: black;
            font-size: 1rem;
        }

        h6 {
            color: black;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1cm;
        }

        p {
            font-size: 0.8rem;
            color: #6D6F78;
        }

        /*back-to-top*/
        #button {
            display: inline-block;
            background-color: #FF531D;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
                opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #FFF9EC;
        }

        #button:hover {
            cursor: pointer;
            background-color: #333;
        }

        #button:active {
            background-color: #555;
        }

        #button.show {
            opacity: 1;
            visibility: visible;
        }

        /* 頁首 */
        nav {
            background: #FDED73;
            padding: 5px 40px;
            height: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        nav ul li {
            padding: 0;
            cursor: pointer;
        }

        nav ul li.items {
            position: relative;
            width: auto;
            margin: 0 16px;
            text-align: center;
            order: 3;
        }

        nav ul li.items:after {
            position: absolute;
            content: '';
            left: 0;
            bottom: 5px;
            height: 2px;
            width: 100%;
            background: #C72828;
            opacity: 0;
            transition: all 0.2s linear;
        }

        nav ul li.items:hover:after {
            opacity: 1;
            bottom: -16px;
        }

        nav ul li.logo {
            flex: 1;
            cursor: default;
            user-select: none;
        }

        nav ul li a {
            color: #FF531D;
            font-size: 1.2rem;
            font-weight: 500;
            text-decoration: none;
            transition: .4s;
        }

        nav ul li:hover a {
            color: #C72828;

        }

        nav ul li i {
            font-size: 23px;
        }

        nav ul li.btn {
            display: none;
        }

        nav ul li.btn.hide i:before {
            content: '\f00d';
        }

        @media all and (max-width: 900px) {
            nav {
                padding: 5px 30px;
            }

            nav ul li.items {
                width: 100%;
                display: none;
            }

            nav ul li.items.show {
                display: block;
            }

            nav ul li.btn {
                display: block;
            }

            nav ul li.items:hover {
                border-radius: 5px;
                box-shadow: inset 0 0 5px #C72828,
                    inset 0 0 10px #C72828;
            }

            nav ul li.items:hover:after {
                opacity: 0;
            }
        }

        /* 頁尾 */
        footer {
            background: #465C69;
            width: 100%;
            height: auto;
            /* position: relative;
                bottom: 0%; */
            margin: 0%;
            color: #fff9ec;
            padding-top: 20px;
        }

        footer h4 {
            color: #fff9ec;
        }

        #footer {
            display: flex;
            flex-shrink: inherit;
            justify-content: space-around;
            margin: 0;
            line-height: 2em;
            padding-bottom: 20px;
        }

        #footer a {
            text-decoration: none;
            color: #fff9ec;
        }

        #logo {
            width: 180px;
            margin-top: 20px;
        }

        i {
            width: 17px;
        }

        #copyright {
            text-align: center;
        }

        @media screen and (max-width: 922px) {
            #footer {
                width: 100%;
                flex-wrap: wrap;
            }
        }

        /*餐點預估時間*/
        address {
            font-style: normal;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
            background: url("bg.png"), -webkit-linear-gradient(bottom, #FFF9EC, #FDED73);
        }

        .container {
            width: 50%;
            height: auto;
            background: #FFEFDF;
            text-align: center;
            border-radius: 5px;
            padding: 50px 30px 10px 30px;
        }

        .container header {
            color: #C72828;
            font-size: 35px;
            font-weight: 600;
            margin: 0 0 30px 0;
        }

        .container .progress-bar {
            display: flex;
            margin: 30px auto;
            user-select: none;
        }

        .container .progress-bar .step {
            text-align: center;
            width: 100%;
            position: relative;
        }

        .container .progress-bar .step p {
            font-weight: 500;
            font-size: 15px;
            color: #000;
            margin-bottom: 8px;
        }

        .progress-bar .step .bullet {
            height: 30px;
            width: 30px;
            border: 2px solid #000;
            display: inline-block;
            border-radius: 50%;
            position: relative;
            font-weight: 500;
            font-size: 17px;
            line-height: 25px;
        }


        .progress-bar .step .bullet span {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .progress-bar .step .bullet:before,
        .progress-bar .step .bullet:after {
            position: absolute;
            content: '';
            bottom: 11px;
            right: -132px;
            height: 3px;
            width: 125px;
            background: #262626;
        }

        .progress-bar .step:last-child .bullet:before,
        .progress-bar .step:last-child .bullet:after {
            display: none;
        }
    </style>
</head>


<body>
    <!-- back to top -->
    <a id="button"></a>
    <script>
        var btn = $('#button');

        $(window).scroll(function () {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function (e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });
    </script>
    <!-- 頁首 -->
    <nav>
        <ul>
            <li class="logo"><a href="Mainpage.html">
                    <img src="LOGO4.svg" width="120px" height="70px" alt="brand">
                </a></li>
            <li class="items"><a href="Intro.html">簡介</a></li>
            <li class="items"><a href="Menu.html">菜單</a></li>
            <li class="items"><a href="judge.php">預約</a></li>
            <li class="items"><a href="BranchStoreInFo.html">分店資訊</a></li>
            <li class="items"><a href="judge_login.php"><span class="far fa-user"></a></li>
            <li class="items"><a href="#">繁/ENG</a></li>
            <li class="btn"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
    </nav>
    <script>
        $(document).ready(function () {
            $('.btn').click(function () {
                $('.items').toggleClass("show");
                $('ul li').toggleClass("hide");
            });
        });
    </script>

    <!-- body -->
    <address>
        <div class="container">
            <header>已收到您的訂單。</header>
            <h4>餐點完成預估時間：10分鐘後</h4>
            <h4>感謝您對永和豆漿的支持！</h4>
            <h4>領取分店<h4>
            <?php
                $conn=mysqli_connect("localhost","root","root","shopping_list");
                $sql = "select * from store2";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result))
                {
                    echo "$row[path]";
                } 
            ?>
            <hr style="margin:30px;">
            <div class="progress-bar">
                <div class="step">
                    <p style="color:#FF531D">
                        確認中
                    </p>
                    <div class="bullet" style="background-color: #FF531D; border-color: #FF531D; color:#fff">
                        <span>1</span>
                    </div>
                </div>
                <div class="step">
                    <p>
                        準備餐點中
                    </p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                </div>
                <div class="step">
                    <p>
                        餐點快好囉～
                    </p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                </div>
                <div class="step">
                    <p>
                        餐點完成請取餐
                    </p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                </div>
            </div>
    </address>
    <!-- 頁尾 -->
    <footer>
        <div id="footer">
            <div id="about">
                <h4>關於我們</h4>
                <a href="">關於永和豆漿</a><br>
                <a href="">常見問題</a><br>
                <a href="">安心宣言</a><br>
                <a href="">隱私權政策</a><br>
                <a href="">服務條款</a><br>
            </div>
            <div id="member">
                <h4>會員專區</h4>
                <a href="">加入會員</a><br>
                <a href="">據點查詢</a><br>
                <a href="">訂閱電子報</a><br>
            </div>
            <div id="cooperate">
                <h4>合作加盟</h4>
                <a href="">加盟專區</a><br>
                <a href="">異業合作</a><br>
                <a href="">人才招募</a><br>
            </div>
            <div id="logo">
                <!-- logo.jpg -->
                <img src="LOGO3.svg" alt="">
            </div>
            <div id="connect">
                <h4>聯絡我們</h4>
                <a href=""><i class="fab fa-facebook-square"></i> Facebook</a><br>
                <a href=""><i class="fab fa-instagram"></i> Instagram</a><br>
                電話:0800-092-000<br>
                <a href="">客服信箱</a><br>
            </div>
            <div id="time">
                <h4>營業時間</h4>
                周一至周日<br>
                17:30-11:30 <br>
            </div>
        </div>
        <hr>
        <div id="copyright">Copyright © 2021 Yong Ho Dou Jiang. All rights reserved.</div>
    </footer>

</body>

</html>