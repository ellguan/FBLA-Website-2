<?php
    require_once('mysqlconfig.php');
    session_start();

    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }

    if ($stmt = $conn->prepare('SELECT firstname, lastname, username, secretword FROM login WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($firstname, $lastname, $username, $secretword);
            $stmt->fetch();
            if (password_verify($_POST['password'], $secretword)) {
                $_SESSION['name'] = $firstname . ' ' . $lastname;
                //$_SESSION['userlogin'] = $user;
                $_SESSION['loggedin'] = "true";
                echo"<script>    window.location.href = 'index.php';</script>";
                echo 'Successfully logged in!';
            } else {
                $_SESSION['loggedin'] = "false";
                echo"<script>window.location.href = 'index.php';</script>";
            }
        } else {
            $_SESSION['loggedin'] = "false";
            echo"<script>    window.location.href = 'index.php';</script>";
        }
        $stmt->close();
    }else{
        echo 'There were errors while connecting to database.';
    }
?>
