<?php
    session_start();
    require_once('mysqlconfig.php');
?>

<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>checkout!</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-image:url("pictures/checkoutbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                color:white;
            }
        </style>
    </head>
    <body>
        <div id="menu" onclick="menuclose()">
            <div id="menuitems">
                <h1 onclick="menuclose()">&times;</h1>
                <!--logo here-->
                <!--line here-->
                <h1 onclick="goHome()">Home</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰</button> 
        </span>

        <div id="header">
            <img src="pictures/checkout.png">
            <h1 onclick="goHome()">Be HAAPI, Eat Noodles</h1>
        </div>
        <br>
        <br>

        <div id="sidebyside">
            <div id="noodlepics">
            </div>
            <div id="filters">
        </div>
        <br>
        <div id="checkout">
                <button  onclick="pay()">Pay now!</button>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script>
        </script>

    </body>
</html>