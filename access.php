<?php 

 if($_SESSION['usertype'] == NULL || $_SESSION['usertype'] == 'SIB' || $_SESSION['usertype'] == 'ONB'|| $_SESSION['usertype'] == 'OPT'|| $_SESSION['usertype'] == 'RPT') {
    header("Location:auth-signin.php");
    die;
}