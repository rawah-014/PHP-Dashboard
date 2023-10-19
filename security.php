<?php
session_start();
include('dbconfig.php');

 if(!$_SESSION['username']&& $_SESSION['usertype']){
    header('location:auth-signin.php');
} 


?>