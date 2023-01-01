<?php
    require_once('config.php');
    session_start();
    
    // if(!isset($_SESSION['userlogin'])){
    //     header("location: login.php"); //redirects to main page if person is already authenticated
    // }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("location: login.php");
    }

    //creates the arrays for the shop and shopping cart
    $_SESSION["cart"] = array();
    $_SESSION["cartamount"] = array();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>store name here!</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">

        <style>
            
        </style>
    </head>
    <body>
        <div id="title">
            <h1>Noodles start here.</h1>
            <button id="gotoshop" onclick="goShop()">Start exploring &#8594</button> <!--change button link-->
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div id="slideshow">
            <h1>SHOP BY...</h1>
            <div id="flagslideshow">
                <img src="pictures/flags/china.png" onclick="filter('china')">
                <img src="pictures/flags/india.webp" onclick="filter('india')">
                <img src="pictures/flags/bangladesh.png" onclick="filter('bangladesh')">
                <img src="pictures/flags/indonesia.webp" onclick="filter('indonesia')">
                <img src="pictures/flags/japan.png" onclick="filter('japan')">
                <img src="pictures/flags/malaysia.png" onclick="filter('malaysia')">
                <img src="pictures/flags/philippines.webp" onclick="filter('philippines')">
                <img src="pictures/flags/south korea.webp" onclick="filter('southkorea')">
                <img src="pictures/flags/thailand.webp" onclick="filter('thailand')">
                <img src="pictures/flags/vietnam.png" onclick="filter('vietnam')">
            </div>
            <h1>Country?</h1>
            <button onclick="goShop()">More filters &#8594</button>
        </div>

        <div id="parallax">
            <h1>Don't know where to start?</h1>
            <p>Here are some of current customers' favorites!</p>
        </div>

        <div id="form">
            <h1>Sign up to be part of the slurp army!</h1>
            <p>Get member-only rewards!</p>
            <form>
                <div class="flexbox">
                    <div>
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name"><br>
                    </div>
                    <div>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email"><br>
                    </div>
                </div>
                <br>
                <label for="message">See a brand you love but don't see? Or any other general questions or comments? We would love to hear from you!</label><br>
                <textarea name="message"></textarea><br>
                <br>
                <input type="submit" value="Sign up!">
            </form>
        </div>
        <a href="index.php?logout=true">Logout</a>
        <div id="footer">&copy; 2010-<?php echo date("Y");?></div>
        <script src="script.js" type="text/javascript"></script>
        <script>
            
        </script>
    </body>
</html>