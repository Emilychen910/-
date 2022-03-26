<?php
    $conn=mysqli_connect("localhost","root","root","member_list");
    $u=mysqli_real_escape_string($conn,$_POST[mail]);
    //$p=mysqli_real_escape_string($conn,$_POST[password]);
    $sql = "select * from members where mail = '$u'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row==null){
        $url = "login.html";
        echo "<script>alert('帳號/密碼錯誤')</script>";
        echo "<script>window.location.href = '$url'</script>";
        // echo "找不到此帳號<br>";
        // echo "<a href='newaccount.html'> 註冊帳號 </a>";
        // echo "<a href='login.html'> 重新登入 </a>";
    }
    else{       
        if(password_verify($_POST[password],$row["password"]))
        {
            setcookie("mail", "$_POST[mail]", time()+3600);
            //echo "<script>alert（'成功登入')</script>";
            //header('Location: homepage.php');
            $url = "Mainpage.html";
            echo "<script>alert('成功登入')</script>";
            echo "<script>window.location.href = '$url'</script>";
        }else
        {
            $url = "login.html";
            echo "<script>alert('帳號/密碼錯誤')</script>";
            echo "<script>window.location.href = '$url'</script>";
            // echo "wrong password, please try again.<br>";
            // echo "<a href='login.html'> 重新登入 </a>";
        }
    }
?>