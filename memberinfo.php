<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Information</title>
    <style>
        form {
            background: #ffefdf;
            border-radius: 20px;
            font-size: 2rem;
            color: black;
        }
    </style>
</head>

<body>
    <?php
        $mail=$_COOKIE['mail'];
        $conn=mysqli_connect("localhost","root","root","member_list");
        $u=mysqli_real_escape_string($conn,$mail);
        $sql = "select * from members where mail = '$u'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    ?>
    <div class="all">
        <div>會員資料編輯</div>
        <div>
            <form action="memberinfo_change.php" method="POST">
                <label>姓名：</label>
                <input type="text" value= "<?php echo $row[name];?>" name="name"><br>
                <label>性別：</label>
                <input type="text" value= "<?php echo $row[sex];?>" ><br>
                <label>電子信箱：</label>
                <input type="email" value= "<?php echo $row[mail];?>" name="mail" ><br>
                <label>生日</label>
                <input type="date" value= "<?php echo $row[birth];?>" ><br>
                <label>電話：</label>
                <input type="text" value= "<?php echo $row[tele];?>" name="tele"><br>
                <input type="button" onclick="javascript:location.href='Mainpage.html'" value="取消">
                <input type="submit" value="儲存">
                <a href="logout.php">登出</a>
            </form>
        </div>
    </div>    
</body>

</html>