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
        $amount = $_POST["number"];
        array_push($_SESSION["cart"], $id);
        array_push($_SESSION["cartamount"], $amount);

        // Sending Response
        echo implode(", ", $_SESSION["cart"]);
        echo var_dump($_SESSION["cartamount"]);
    }
?>