<?php
    require_once('config.php');
?>

<!DOCTYPE html>
<html> 
    <head>
        <title>User Registration</title>
    </head>
    <body>
        <div>
            <form action="registration.php" method="post">
                <div class="container">
                    <h1>Registration</h1>
                    <p>Become part of the slurp army and get member-only rewards!</p>
                    <label for="firstname">First name</label>
                    <input id="firstname" type="text" name="firstname" required>
                    <label for="lastname">First name</label>
                    <input id="lastname" type="text" name="lastname" required>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required>
                    <label for="secretword">Create a password:</label>
                    <input id="secretword" type="password" name="secretword" required>
                    <input type="button" id="register" name="create" value="Create an account!">
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