<?php
    $conn=mysqli_connect("localhost","root","root","member_list");
    $u=mysqli_real_escape_string($conn,$_POST[mail]);
    $sql = "select * from members where mail = '$u'";
    //$sql="select * from members where mail like '%$_POST[mail]%'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_fetch_array($result) == FALSE){
        if($_POST['password'] == $_POST['c_password']){
            $hash = password_hash($_POST[password], PASSWORD_DEFAULT);//加密
            $sql2="insert into members values('$_POST[mail]','$hash','$_POST[name]','$_POST[sex]','$_POST[birth]','$_POST[tele]')";
            mysqli_query($conn,$sql2);
            echo $_POST[mail] . "-" . $_POST[name] . "<br>";
            $url ="Login.html";
            echo "<script>alert('註冊成功，請重新登入')</script>";
            echo "<script>window.location.href = '$url'</script>";
        }else{
            $url ="Register.html";
            echo "<script>alert('確認密碼輸入錯誤，請重新註冊')</script>";
            echo "<script>window.location.href = '$url'</script>";
        }
    }else{
        $url ="Login.html";
        echo "<script>alert('已註冊過此信箱，請登入')</script>";
        echo "<script>window.location.href = '$url'</script>";
    }
?>

<!-- $conn = mysqli_connect("localhost","root","password","member_list");
$sql = "insert into members values('$_POST[mail]','$_POST[password]','$_POST[name]','$_POST[sex]','$_POST[birth]','$_POST[tele]','$_POST[home]')";
if($_POST['password'] == $_POST['c_password'])
{
    echo "correct password";
    mysqli_query($conn,$sql);
}
else
{
    echo "<script>alert('確認密碼輸錯了')</script>";
} -->