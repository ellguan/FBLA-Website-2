<?php
    require_once('config.php');
    session_start();
?>

<!DOCTYPE html>
<html> 
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>User Registration</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <style>
        body {
            background-image:url("pictures/registrationbg.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Jost', sans-serif;
            margin:auto;
            color:white;
        }
        #noodlepics{
            display:flex;
        }
        #noodlepics div{
            padding:1%;
        }
        #registrationpic{
            max-width: 100%;
            height:auto;
            vertical-align:middle; 
            text-align:center;
        }
        #picdiv{
            max-width:40%;
            height:auto;
        }
        #loginp{
            color:#F1BA0A;
            cursor:pointer;
            transition-duration:.5s
        }
        #loginp:hover{
            color:#F6DE26;
        }
        #registrationsubmit button{
            font-size:100%;
            transition-duration:.5s
        }
        #registrationsubmit:hover{
            color:#A70B0B;
            border-color:#A70B0B;
        }
        input[type=text], textarea, input[type=password], input[type=email]{
            font-size:100%;
        }
        @media (max-width: 1000px){
            #picdiv{
                display:none;
            }
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

        <div id="loginformdiv">
            <form id="loginform" action="jslogin.php" method="post">
                <h1 onclick="loginclose()" id="closelogin" style="font-size:400%;">&times;</h1>
                <h3 id="loggedinform">You are currently signed in as <?php echo $_SESSION['name'] ?>. Click here to <a href="logout.php">Log out</a>. Note that logging out will delete any products currently in your cart.</h3>
                <img src="pictures/heart2.png">
                <h1><i class="fa fa-user"></i> Username</h1>
                <input type="text" placeholder="Enter username" name="username" required style="font-size:100%;" autocomplete="on">
                <h1><i class="fa fa-key"></i> Password</h1>
                <input type="password" placeholder="Enter password" name="password" required autocomplete="on"><br><br>
                <button type="submit" >Login!</button>
                <p>Don't have an account? <a href="registration.php">Sign Up!</a></p>
            </form>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
        </span>

        <span>
        <button id="homebtn" onclick="goHome()"></button>
        </span>

        <div id="header">
            <img src="pictures/registration.png"> 
        </div>

        <div id="sidebyside">
            <div id="noodlepics">
                <div style="flex-grow: 3">
                <h1>More noodles for you. More noodles for everyone. Spread the HAAPIness as a member!</h1>
                <p>→ One free noodle pack of your choice for every five orders!</p>
                <p>→ Promotions tailored to your frequent orders sent straight to your inbox!</p>
                <p>→ Be the first to be notified of exclusive products!</p>
                <h2>The best part is... signing up is absolutely FREE!</h2>
                <br>
                <p>Already have an account? </p>
                <p id="loginp" onclick="login()">Log in!</p>
                </div>
                <div style="flex-grow: 1" id="picdiv">
                    <img id="registrationpic" src="pictures/registrationphoto.jpg">
                </div>
            </div>
            <form action="process.php" method="post" id="filters">
                <h1>Sign up now!</h1>
                <div class="inputs">
                    <h3><label for="firstname">First name:</label></h3>
                    <input id="firstname" type="text" name="firstname" required>
                    <br>
                    <h3><label for="lastname">Last name:</label></h3>
                    <input id="lastname" type="text" name="lastname" required>
                    <br>
                    <h3><label for="email">Email:</label></h3>
                    <input id="email" type="email" name="email" required>
                    <br>
                    <h3><label for="username">Create a username:</label></h3>
                    <input id="username" type="text" name="username" required>
                    <br>
                    <h3><label for="secretword">Create a password:</label></h3>
                    <input id="secretword" type="password" name="secretword" required>
                    <br>
                    <br>
                    <button type="submit" style="font-size:100%;" id="registrationsubmit">Create an account!</button>
                </div>
            </form>
        </div>
        <br>
        <div id="footer">&copy; Be HAAPI, Eat Noodles 2022-<?php echo date("Y");?></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            // $(function(){
            //     $('#register').click(function(e){
            //         var valid = this.form.checkValidity();
            //         console.log(valid);
                    
            //         if(valid){
            //             var firstname   = $('#firstname').val();
            //             var lastname    = $('#lastname').val();
            //             var email       = $('#email').val();
            //             var username    = $('#username').val();
            //             var secretword  = $('#secretword').val();

            //             e.preventDefault();

            //             $.ajax({
            //                 type: 'POST',
            //                 url: 'process.php',
            //                 data: {firstname: firstname, lastname: lastname, email: email, username: username, secretword: secretword},
            //                 success: function(data){
            //                     Swal.fire({
            //                         'title': 'Account created!',
            //                         'text': data,
            //                         'icon': 'success'
            //                     });//.then( function() {
            //                         // this gets run after the OK button is clicked
            //                         //window.location = "https://google.com";
            //                     //});
            //                 },
            //                 error: function(data){
            //                     Swal.fire({
            //                         'title': 'Oops, something went wrong.',
            //                         'text': 'You may not have entered correct values. Please try again!',
            //                         'icon': 'error'
            //                     })
            //                 }
            //             });

            //         }else{
                        
            //         }
            //     }) 
            // })        
        </script>
        <div>
            <?php

            ?>
        </div>
    </body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <?php
    if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin'] == "true" || $_SESSION['loggedin'] == "no"){
            echo "<script>document.getElementById('loginlink').innerHTML = 'Logout';</script>";
            echo "<style>#loggedinform {display:block;}</style>";
        }
    }

    ?>
</html>