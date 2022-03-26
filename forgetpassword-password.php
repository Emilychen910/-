<?php
    $mail=$_COOKIE['mail'];
    $conn=mysqli_connect("localhost","root","root","member_list");
    $u=mysqli_real_escape_string($conn,$mail);
    $sql = "select * from members where mail = '$u'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($_COOKIE['mail'] == TRUE){
        if($_POST['password'] == $_POST['c_password']){
            if(password_verify($_POST[password],$row["password"]))
            {
                $url = "Mainpage.html";
                echo "<script>alert('這是舊密碼，看來你想起來了><')</script>";
                echo "<script>window.location.href = '$url'</script>";
                setcookie("mail", "$_POST[mail]", time()-3600);
            }else
            {
                $hash = password_hash($_POST[password], PASSWORD_DEFAULT);//加密
                $sql2="update members set password='$hash' where mail='$mail'";
                mysqli_query($conn,$sql2);
                $url = "Login.html";
                echo "<script>alert('更改成功，請重新登入')</script>";
                echo "<script>window.location.href = '$url'</script>";
                setcookie("mail", "$_POST[mail]", time()-3600);
            }
        }else{
            $url = "ForgetPassword-password.html";
            echo "<script>alert('確認密碼不符合')</script>";
            echo "<script>window.location.href = '$url'</script>";
        } 
        
    }else{
        echo "<script>alert('><')</script>";
        setcookie("mail", "$_POST[mail]", time()-3600);
    }        
?>