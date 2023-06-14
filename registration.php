<?php
    require_once('config.php');
?>

<!DOCTYPE html> <!-- weird thing is showing up at the top of the page, remember to ask ellen about it -->
<html> 
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <title>User Registration</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <style>

        body {
            background-image:url("pictures/front image desktop.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Jost', sans-serif;
            margin:auto;
        }

        h1 {
            width:70%;
            text-align: left;
            margin-left:-2%;
            margin-top:-5%;
            font-size:470%;
            color: #F1BA0A;
        }

        h3 {
            text-align: left;
            margin-left:-2%;
            margin-top:-5%;
            font-size: 150%;
            color: #F1BA0A;
        }

        .container{
            padding:5%;
            margin: 5%;
            font-size:150%;
            height:20%;
            border: 2px solid #F1BA0A;
        }

        .inputs{
            background-color:#F1BA0A;
            font-size:150%;
            padding:5%;
            height: 40%;
            text-align: center; 
        }

        #register {
            background-color: white;
            padding:1%;
            margin:.5%;
            font-size:60%;
            cursor:pointer;
            transition-duration:.4s;
            text-decoration:none;
            color: black;
        }

        #register:hover{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
            color:#A70B0B;
        }

        .thank{
            background-color:#F1BA0A;
            height:10%;
            font-size:200%;
            text-align: center;
            padding: 5%;
        }

        



        </style>
    </head>
    <body>
        <div>
            <form action="registration.php" method="post">
                <div class="container">
                    <h1> Become a member! </h1>   <!--this feels awkwardddd i dont like the words but i cant figure out what to change it to -->
                    <h3> Join the slurp army and get member-only rewards! </h3>

                </div>

                
                <br>
                <br>
                <br>
                <br>

                <div class = "benefits">


                </div>

                <div class="inputs">
                    <label for="firstname">First name:</label>
                    <br>
                    <input id="firstname" type="text" name="firstname" required>
                    <br>
                    <br>
                    <label for="lastname">Last name:</label>
                    <br>
                    <input id="lastname" type="text" name="lastname" required>
                    <br>
                    <br>
                    <label for="email">Email:</label>
                    <br>
                    <input id="email" type="email" name="email" required>
                    <br>
                    <br>
                    <label for="secretword">Create a password:</label>
                    <br>
                    <input id="secretword" type="password" name="secretword" required>
                    <br>
                    <br>
                    <input type="button" id="register" name="create" value="Create an account!">
                </div>

                <br>
                <br>
                <br>

                <div class = "thank">
                    <p> Thank you for visiting! </p>
                </div>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            $(function(){
                $('#register').click(function(e){
                    var valid = this.form.checkValidity();
                    
                    if(valid){
                        var firstname   = $('#firstname').val();
                        var lastname    = $('#lastname').val();
                        var email       = $('#email').val();
                        var secretword  = $('#secretword').val();

                        e.preventDefault();

                        $.ajax({
                            type: 'POST',
                            url: 'process.php',
                            data: {firstname: firstname, lastname: lastname, email: email, secretword: secretword},
                            success: function(data){
                                Swal.fire({
                                    'title': 'Account created!',
                                    'text': data,
                                    'icon': 'success'
                                });//.then( function() {
                                    // this gets run after the OK button is clicked
                                    //window.location = "https://google.com";
                                //});
                            },
                            error: function(data){
                                Swal.fire({
                                    'title': 'Oops, something went wrong.',
                                    'text': 'You may not have entered correct values. Please try again!',
                                    'icon': 'error'
                                })
                            }
                        });

                    }else{
                        
                    }
                }) 
            })        
        </script>
        <div>
            <?php

            ?>
        </div>
    </body>
</html>