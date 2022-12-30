<?php
    session_start();

    $cart = array();
    $_SESSION["cart"] = $cart;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Shop</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">

        <style>
            img{
                height:25%;
                width:25%;
            }
            button{
                border:#F1BA0A 3px solid;
                background-color:black;
                padding:5px;
                font-size:60%;
                cursor:pointer;
                transition-duration:.4s;
                text-decoration:none;
                color:#F1BA0A;
            }
        </style>
    </head>
    <body>
        <img src="pictures/noodles/shin.jpg" alt="Shin Ramen">
        <button class="addtocart" id="shin">Add to cart!</button>

        <button class="addtocart" id="urmom">Add to cart!</button>

        <button class="addtocart" id="hello">Add to cart!</button>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>
</html>