<?php
    require_once('config.php');
    session_start();
?>

<?php
    // Checking, if post value is
    // set by user or not
    if(isset($_POST['id']))
    {
        // Getting the value of button
        // in $btnValue variable
        $id = $_POST['id'];
        array_push($_SESSION["cart"], $id);
       
        // Sending Response
        echo implode(", ", $_SESSION["cart"]);
    }
?>