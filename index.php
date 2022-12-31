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
    </head>
    <body>
        <div id="title">
            <h1>Noodles start here.</h1>
            <button><a href="https://www.aauw.org/resources/research/the-stem-gap/">Start exploring &#8594</a></button> <!--change button link-->
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
                <!-- <img src="pictures/flags/china.png">
                <img src="pictures/flags/india.webp">
                <img src="pictures/flags/bangladesh.png">
                <img src="pictures/flags/indonesia.webp">
                <img src="pictures/flags/japan.png">
                <img src="pictures/flags/malaysia.png">
                <img src="pictures/flags/philippines.webp">
                <img src="pictures/flags/south korea.webp">
                <img src="pictures/flags/thailand.webp">
                <img src="pictures/flags/vietnam.png"> -->
            </div>
            <button><a href="https://www.aauw.org/resources/research/the-stem-gap/">More filters &#8594</a></button>
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
        <p> Bunnies are super super cute! They are great, fuzzy companions who will love you and fill your heart! (not your stomach)</p>
    </body>
</html>