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
        if (in_array($id, $_SESSION["cart"])){
            $index = array_search($id, $_SESSION['cart']);
            $_SESSION["cartamount"][$index] += $amount;
        }else{
            array_push($_SESSION["cart"], $id);
            array_push($_SESSION["cartamount"], $amount);
        }
        
        // Sending Response
        echo implode(", ", $_SESSION["cart"]);
        echo var_dump($_SESSION["cartamount"]);
    }
?>