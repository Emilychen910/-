<?php
        $mail=$_POST['mail'];
        $conn=mysqli_connect("localhost","root","root","member_list");
        $sql="update members set name='$_POST[name]' where mail='$mail'";
        mysqli_query($conn,$sql);
        $sql1="update members set tele='$_POST[tele]' where mail='$mail'";
        mysqli_query($conn,$sql1);
        $url = "memberinfo.php";
        echo "<script>alert('修改成功')</script>";
        echo "<script>window.location.href = '$url'</script>";
?>