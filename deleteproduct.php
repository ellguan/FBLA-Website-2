<?php
    require_once('config.php');
    session_start();
?>

<?php
        if (isset($_POST['id'])){
            $deletedProduct = $_POST['id'];
            $productIndex = array_search($deletedProduct, $_SESSION["cart"]);
            // array_splice($_SESSION["cart"], $productIndex, $productIndex);
            // array_splice($_SESSION["cartamount"], $productIndex, $productIndex);
            unset($_SESSION["cart"][$productIndex]);
            unset($_SESSION["cartamount"][$productIndex]);
            $_SESSION["cart"] = array_values($_SESSION["cart"]);
            $_SESSION["cartamount"] = array_values($_SESSION["cartamount"]);
            echo var_dump($_SESSION["cart"]);
            echo var_dump($_SESSION["cartamount"]);
        }
    ?>