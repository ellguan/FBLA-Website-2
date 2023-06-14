<?php
    //THIS PAGE IS NOT USED.

    require_once('config.php');

    session_start();

    if(isset($_SESSION['userlogin'])){
        header("location: index.php"); //redirects to main page if person is already authenticated
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
        <link href="style.css" rel="stylesheet" type="text/css" /> 
        <link rel="icon" href="./pictures/heart.png" type="image/png"> <!--placeholder-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
        <style>
            body{
                background-image:url("pictures/loginbg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            @media (min-width: 1000px){
                #menuitems {
                    width:25%;
                }
            }
            h1{
                font-size:2em;
                font-weight:bold;
                line-height:180%;
            }
            #logindiv{
                width:80%;
                background-color:#A70B0B;
                margin-left:auto;
                margin-right:auto;
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
                <h1 onclick="goAbout()">About</h1>
                <h1 onclick="goContact()">Contact</h1>
                <h1 onclick="goShop()">Products</h1>
                <h1 onclick="goCart()">Shopping Cart</h1>
                <h1 onclick="goCredits()">Credits</h1>
            </div>
        </div>

        <span> 
            <button id="menubutton" onclick="menuopen()">☰ Be HAAPI, Eat Noodles</button> 
        </span>
        
        <span>
            <button id="homebtn" onclick="goHome()"></button>
        </span>

        <div id="logindiv">
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="" class="brand_logo" alt="website logo"> <!--placeholder-->
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></span>
                            </div>
                            <input type="text" name="username" id="username" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></span>
                            </div>
                            <input type="password" name="secretword" id="secretword" required>
                            <div class="form-group-append">
                                <input type="checkbox" name="rememberme" id="rememberme">
                                <label for="rememberme">Remember me</label>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 login container">
                    <button type="button" name="button" id="login">Login</button>
                </div>
                <div class="link">
                    <p>Don't have an account? <a href="registration.php">Sign Up!</a></p>
                </div>
                <!--TOtally will add a forgot password option-->
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
        <script>
            $(function(){
                $("#login").click(function(e){
                    //var valid = this.form.checkValidity();

                    //if(valid){
                        var username = $('#username').val();
                        var secretword = $('#secretword').val();
                        
                    //}

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'jslogin.php',
                        data: {username:username, secretword:secretword},
                        success: function(data){
                            alert(data);
                            if($.trim(data) === "1"){
                                setTimeout('window.location.href = "index.php", 2000'); //placeholder
                            }
                        },
                        error: function(data){
                            alert('there were errors while doing the operation.');
                        }

                    });
                });
            })
        </script>
    </body>
</html>