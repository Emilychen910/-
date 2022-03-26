<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
    <link rel="icon" href="LOGO3.ico" type="image/x-icon" />
    <title>餐點確認</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            background: white;
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
        /* Header */
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
        /* Content */
        #all{
            width: 80%;
            margin: 60px auto;
            
        }
        #course{
            background: #fff9ec;
            border-radius: 20px;
            height: auto;
        }
        table{
            margin: auto;
            text-align: center;
            width: 80%;
            line-height: 2.5em;
        }
        th{
            font-size: 1.2em;
            border-bottom: 2px solid #6D6F78;
        }
        tbody{
            border-bottom: #E5E5E5;
        }
        tfoot{
            border-top: 2px solid #6D6F78;
        }
        .store{
            background: #fff9ec;
            border-radius: 20px;
            margin-top: 40px;
        }
        #store{
            line-height: 2.5em;
            font-size: 1.2em;
            text-align: center;
            width: 80%;
        }
        #alarm{
            color: red;
            margin: 20px auto;
            text-align: center;
        }
        .click{
            display: flex;
            justify-content: flex-end;
            
        }
        #space{
            width: 40px;
        }
        #send{
            background: #FF531D;
            border-radius: 10px;
            width: 150px;
            height: 40px;
            color: #fff9ec;
            font-size: 1.2em;
            border: none;
        
        }
        #pageup{
            background: #E5E5E5;
            border-radius: 10px;
            width: 150px;
            height: 40px;
            color: #000;
            font-size: 1.4em;
            border: none;
        }
        /* Footer */
        footer{
            background:#465C69 ;
            width: 100%;
            height: auto;
            /* position: relative;
            bottom: 0%; */
            margin: 0%;
            color: #fff9ec;
            padding-top: 20px;
        }
        #footer{
            display: flex;
            flex-shrink: inherit;
            justify-content: space-around;
            margin: 0;
            line-height: 2em;
            padding-bottom: 20px;
        }
        #footer a{
            text-decoration: none;
            color: #fff9ec;
        }
        #logo{
            width: 180px;
            margin-top: 20px;
        }
        i{
            width: 17px;
        }
        #copyright{
            text-align: center;
        }
        @media screen  and (max-width: 922px){
        #footer{
		width: 100%;
		flex-wrap: wrap;
		}
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
    <!-- Header -->
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
    <!-- Content -->
    <div id="all">
        <div id="course">
            <table rules="rows">
                <thead>
                    <tr>
                        <th>品項</th>
                        <th>價格</th>
                        <th>數量</th>
                        <th>小計</th>
                        <th>備註</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //新增
                        $conn=mysqli_connect("localhost","root","root","shopping_list");
                        if($_POST['countnum'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅','13','$_POST[countnum]','$_POST[memo]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum1'] > 0)
                        {
                            $sql = "insert into shoppings values('油條','13','$_POST[countnum1]','$_POST[memo1]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum2'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅油條','25','$_POST[countnum2]','$_POST[memo2]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum3'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅蛋','23','$_POST[countnum3]','$_POST[memo3]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum4'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅起司蛋','30','$_POST[countnum4]','$_POST[memo4]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum5'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅培根蛋','30','$_POST[countnum5]','$_POST[memo5]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum6'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅火腿蛋','30','$_POST[countnum6]','$_POST[memo6]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum7'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅鮪魚蛋','30','$_POST[countnum7]','$_POST[memo7]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum8'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅玉米蛋','30','$_POST[countnum8]','$_POST[memo8]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum9'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅肉鬆蛋','30','$_POST[countnum9]','$_POST[memo9]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum10'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅豬排蛋','35','$_POST[countnum10]','$_POST[memo10]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum11'] > 0)
                        {
                            $sql = "insert into shoppings values('燒餅沙拉','40','$_POST[countnum11]','$_POST[memo11]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum12'] > 0)
                        {
                            $sql = "insert into shoppings values('蛋餅','15','$_POST[countnum12]','$_POST[memo12]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum13'] > 0)
                        {
                            $sql = "insert into shoppings values('起司蛋餅','25','$_POST[countnum13]','$_POST[memo13]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum14'] > 0)
                        {
                            $sql = "insert into shoppings values('培根蛋餅','25','$_POST[countnum14]','$_POST[memo14]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum15'] > 0)
                        {
                            $sql = "insert into shoppings values('火腿蛋餅','25','$_POST[countnum15]','$_POST[memo15]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum16'] > 0)
                        {
                            $sql = "insert into shoppings values('鮪魚蛋餅','25','$_POST[countnum16]','$_POST[memo16]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum17'] > 0)
                        {
                            $sql = "insert into shoppings values('玉米蛋餅','25','$_POST[countnum17]','$_POST[memo17]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum18'] > 0)
                        {
                            $sql = "insert into shoppings values('肉鬆蛋餅','25','$_POST[countnum18]','$_POST[memo18]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum19'] > 0)
                        {
                            $sql = "insert into shoppings values('豬排蛋餅','30','$_POST[countnum19]','$_POST[memo19]')";
                            mysqli_query($conn,$sql);
                        }   
                        if($_POST['countnum20'] > 0)
                        {
                            $sql = "insert into shoppings values('蛋餅包油條','28','$_POST[countnum20]','$_POST[memo20]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum21'] > 0)
                        {
                            $sql = "insert into shoppings values('蛋餅包飯糰','40','$_POST[countnum21]','$_POST[memo21]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum22'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團','25','$_POST[countnum22]','$_POST[memo22]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum23'] > 0)
                        {
                            $sql = "insert into shoppings values('甜飯團','25','$_POST[countnum23]','$_POST[memo23]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum24'] > 0)
                        {
                            $sql = "insert into shoppings values('素飯團','25','$_POST[countnum24]','$_POST[memo24]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum25'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團蛋','35','$_POST[countnum25]','$_POST[memo25]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum26'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團培根蛋','45','$_POST[countnum26]','$_POST[memo26]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum27'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團火腿蛋','45','$_POST[countnum27]','$_POST[memo27]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum28'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團鮪魚蛋','45','$_POST[countnum28]','$_POST[memo28]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum29'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團玉米蛋','45','$_POST[countnum29]','$_POST[memo29]')";
                            mysqli_query($conn,$sql);
                        }   
                        if($_POST['countnum30'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團肉鬆蛋','45','$_POST[countnum30]','$_POST[memo30]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum31'] > 0)
                        {
                            $sql = "insert into shoppings values('飯團豬排蛋','50','$_POST[countnum31]','$_POST[memo31]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum32'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭','12','$_POST[countnum32]','$_POST[memo32]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum33'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭加蛋','22','$_POST[countnum33]','$_POST[memo33]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum34'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭起司蛋','32','$_POST[countnum34]','$_POST[memo34]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum35'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭培根蛋','32','$_POST[countnum35]','$_POST[memo35]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum36'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭火腿蛋','32','$_POST[countnum36]','$_POST[memo36]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum37'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭鮪魚蛋','32','$_POST[countnum37]','$_POST[memo37]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum38'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭玉米蛋','32','$_POST[countnum38]','$_POST[memo38]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum39'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭肉鬆蛋','32','$_POST[countnum39]','$_POST[memo39]')";
                            mysqli_query($conn,$sql);
                        }   
                        if($_POST['countnum40'] > 0)
                        {
                            $sql = "insert into shoppings values('饅頭豬排蛋','37','$_POST[countnum40]','$_POST[memo40]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum41'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅','20','$_POST[countnum41]','$_POST[memo41]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum42'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅加蛋','30','$_POST[countnum42]','$_POST[memo42]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum43'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅起司蛋','40','$_POST[countnum43]','$_POST[memo43]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum44'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅培根蛋','40','$_POST[countnum44]','$_POST[memo44]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum45'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅火腿蛋','40','$_POST[countnum45]','$_POST[memo45]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum46'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅鮪魚蛋','40','$_POST[countnum46]','$_POST[memo46]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum47'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅玉米蛋','40','$_POST[countnum47]','$_POST[memo47]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum48'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅肉鬆蛋','40','$_POST[countnum48]','$_POST[memo48]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum49'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥抓餅豬排蛋','45','$_POST[countnum49]','$_POST[memo49]')";
                            mysqli_query($conn,$sql);
                        }   
                        if($_POST['countnum50'] > 0)
                        {
                            $sql = "insert into shoppings values('高麗菜水煎包','12','$_POST[countnum50]','$_POST[memo50]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum51'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥肉水煎包','12','$_POST[countnum51]','$_POST[memo51]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum52'] > 0)
                        {
                            $sql = "insert into shoppings values('韭菜盒','25','$_POST[countnum52]','$_POST[memo52]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum53'] > 0)
                        {
                            $sql = "insert into shoppings values('鍋貼','5','$_POST[countnum53]','$_POST[memo53]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum54'] > 0)
                        {
                            $sql = "insert into shoppings values('蘿蔔糕一份','25','$_POST[countnum54]','$_POST[memo54]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum55'] > 0)
                        {
                            $sql = "insert into shoppings values('蘿蔔糕加蛋','35','$_POST[countnum55]','$_POST[memo55]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum56'] > 0)
                        {
                            $sql = "insert into shoppings values('荷包蛋','10','$_POST[countnum56]','$_POST[memo56]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum57'] > 0)
                        {
                            $sql = "insert into shoppings values('蔥花蛋','10','$_POST[countnum57]','$_POST[memo57]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum58'] > 0)
                        {
                            $sql = "insert into shoppings values('肉包','15','$_POST[countnum58]','$_POST[memo58]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum59'] > 0)
                        {
                            $sql = "insert into shoppings values('菜包','15','$_POST[countnum59]','$_POST[memo59]')";
                            mysqli_query($conn,$sql);
                        }   
                        if($_POST['countnum60'] > 0)
                        {
                            $sql = "insert into shoppings values('鐵板麵','40','$_POST[countnum60]','$_POST[memo60]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum61'] > 0)
                        {
                            $sql = "insert into shoppings values('鐵板麵加蛋','50','$_POST[countnum61]','$_POST[memo61]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum62'] > 0)
                        {
                            $sql = "insert into shoppings values('豆漿','15','$_POST[countnum62]','$_POST[memo62]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum63'] > 0)
                        {
                            $sql = "insert into shoppings values('鹹豆漿','25','$_POST[countnum63]','$_POST[memo63]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum64'] > 0)
                        {
                            $sql = "insert into shoppings values('鹹豆漿加蛋','35','$_POST[countnum64]','$_POST[memo64]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum65'] > 0)
                        {
                            $sql = "insert into shoppings values('豆漿紅茶','20','$_POST[countnum65]','$_POST[memo65]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum66'] > 0)
                        {
                            $sql = "insert into shoppings values('米漿','15','$_POST[countnum66]','$_POST[memo66]')";
                            mysqli_query($conn,$sql);
                        }
                        if($_POST['countnum67'] > 0)
                        {
                            $sql = "insert into shoppings values('紅茶','15','$_POST[countnum67]','$_POST[memo67]')";
                            mysqli_query($conn,$sql);
                        } 
                        if($_POST['countnum68'] > 0)
                        {
                            $sql = "insert into shoppings values('奶茶','20','$_POST[countnum68]','$_POST[memo68]')";
                            mysqli_query($conn,$sql);
                        }
                    //算錢
                        $sql = "select * from shoppings";
                        $result = mysqli_query($conn,$sql);
                        $total = 0;
                        $num = 0;
                        while($row = mysqli_fetch_array($result))
                        {
                            echo 
                            "<tr>
                                <td>" . $row["item_id"] ." </td>
                                <td>" . $row["price"] ." </td>
                                <td>" . $row["amount"] ." </td>
                                <td>" . $row["price"]  *  $row["amount"] ."元 </td>
                                <td>" . $row["memo"] ." </td>  
                            </tr>";
                            $total = $total + $row["price"] * $row["amount"];
                            $num = $num + $row["amount"];
                        }    
                    ?>
                </tbody>
                <tfoot>
                    <?php
                        if($total=='0'){
                            $url ="Reserve.html";
                            echo "<script>alert('您好像沒有點任何餐點唷,請重新點餐')</script>";
                            echo "<script>window.location.href = '$url'</script>";
                        }else{
                            echo
                            "<tr>
                            <td> </td>
                            <td> </td>
                            <td>" . $num . "項 </td>
                            <td>" . $total . "元 </td>";
                        }
                        $sql = "delete from shoppings";
                        mysqli_query($conn,$sql);
                    ?>
                </tfoot>
            </table>
        </div>
        <div class="store">
            <table id="store">
                <tr>
                    <td>取餐分店</td>
                    <?php 
                        $a=$_POST['path'];
                        if($a==null){
                            $url ="Reserve.html";
                            echo "<script>alert('您好像沒有選擇店家唷,請重新點餐')</script>";
                            echo "<script>window.location.href = '$url'</script>";
                        }else{
                            echo
                            "<td>$a</td>";
                            $sql2="update store2 set path='$a' where id='1'";
                            mysqli_query($conn,$sql2);
                        }
                    ?>
                </tr>
            </table>
        </div>
        <div id="alarm">
            &#8251 如線上預約未取餐達一次，該用戶將列入黑名單，禁止再次預約取餐 &#8251
        </div>
        <div class="click">
            <input type="button" value="重新點餐" id="pageup" onclick="location.href='Reserve.html'">
            <div id="space"></div>
            <input type="submit" value="送出餐點" id="send" onclick="location.href='time.php'" >
        </div>
    </div>
    <!-- Footer -->
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
                <img src="LOGO3.svg">
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