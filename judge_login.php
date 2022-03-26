<?php
    if($_COOKIE['mail']==TRUE){
        header('Location: memberinfo.php');
    }else{
        header('Location: Login.html');
    }
?>