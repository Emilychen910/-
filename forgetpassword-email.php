<?php
    $conn=mysqli_connect("localhost","root","root","member_list");
    $u=mysqli_real_escape_string($conn,$_POST[mail]);
    //$p=mysqli_real_escape_string($conn,$_POST[password]);
    $sql = "select * from members where mail = '$u'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row==null){
        $url = "ForgetPassword-email.html";
        echo "<script>alert('找不到此帳號，請再試一遍')</script>";
        echo "<script>window.location.href = '$url'</script>";
    }
    else{       
        header('Location: ForgetPassword-password.html');
        //session賦值
        setcookie("mail", "$_POST[mail]", time()+3600);
    }
?>