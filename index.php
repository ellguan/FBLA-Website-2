<?php
    require_once('config.php');

    session_start();
    
    if(!isset($_SESSION['userlogin'])){
        header("location: login.php"); //redirects to main page if person is already authenticated
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("location: login.php");
    }

?>

<a href="index.php?logout=true">Logout</a>