<?php
require_once('mysqlconfig.php');
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Admin Login</title>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <style>
            body{
                background-image:url("pictures/loginbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .loginformdiv{
                background-color:#A70B0B;
                width:80%;
                padding:5%;
                margin-left:auto;
                margin-right:auto;
                color:white;
            }
            button[type="submit"]{
                border-color:white;
                color:white;
                font-size:100%;
            }
            button[type="submit"]:hover{
                border-color:#F1BA0A;
                color:#F1BA0A;
            }
        </style>

    </head>
    <body>
        <button onclick="topFunction()" id="scrolltop" title="Go to top">&uarr;</button>

        <div id="menu" onclick="menuclose()">
            <div id="menuitems">
                <h1 onclick="menuclose()">&times;</h1>
                <!--logo here-->
                <!--line here-->
                <h1 onclick="goHome()">Home</h1>
                <h1 onclick="goAbout()">About</h1>
                <h1 onclick="login()" id="loginlink">Login</h1>
                <h1 onclick="goRegistration()">Registration</h1>
                <h1 onclick="goContact()">Contact</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
                <h1 onclick="goCredits()">Credits</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" style="color:#F1BA0A;" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
        </span>

        <span>
            <button id="homebtn" onclick="goHome()"></button>
        </span>

        <div id="loginformdiv">
            <form id="loginform" action="jslogin.php" method="post">
                <h1 onclick="loginclose()" id="closelogin" style="font-size:400%;">&times;</h1>
                <h3 id="loggedinform">You are currently signed in as <?php echo $_SESSION['name'] ?>. Click here to <a href="logout.php">Log out</a>. Note that logging out will delete any products currently in your cart.</h3>
                <img src="pictures/heart2.png">
                <h1><i class="fa fa-user"></i> Username</h1>
                <input type="text" placeholder="Enter username" name="username" required style="font-size:100%;" autocomplete="off">
                <h1><i class="fa fa-key"></i> Password</h1>
                <input type="password" placeholder="Enter password" name="password" required autocomplete="off"><br><br>
                <button type="submit">Login!</button>
                <p>Don't have an account? <a href="registration.php">Sign Up!</a></p>
            </form>
        </div>

        <h1 class="title">Admin Portal</h1><br>
        
        <div class="loginformdiv">
            <form class="loginform" action="adminpage.php" method="post">
                <h1><i class="fa fa-user"></i> Username</h1>
                <input type="text" placeholder="Enter username" name="username" required style="font-size:100%;" autocomplete="on">
                <h1><i class="fa fa-key"></i> Password</h1>
                <input type="password" placeholder="Enter password" name="password" required autocomplete="on"><br><br>
                <button type="submit">Login!</button>
            </form>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js" type="text/javascript"></script>
</html>

<?php
    if($_SESSION["adminloggedin"] == "false"){
    echo "<script src='script.js'>
    </script><script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>loginerror()</script>";
    $_SESSION['adminloggedin'] = "else";
}
if(isset($_SESSION['loggedin'])){
    if($_SESSION['loggedin'] == "true" || $_SESSION['loggedin'] == "no"){
        echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
        echo "<style>#loggedinform {display:block;}</style>";
    }
}