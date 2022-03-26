<?php
    if($_COOKIE['mail']==TRUE){
        header('Location: Reserve.html');
    }else{
        $url ="Login.html";
        echo "<script>alert('請登入後再試')</script>";
        echo "<script>window.location.href = '$url'</script>";
    }
?>