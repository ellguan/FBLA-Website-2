<?php
    require_once('config.php');
    session_start();

    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }
    //echo $_POST['username']. $_POST['password'];

    // if ($stmt = $conn->prepare('SELECT id, password FROM login WHERE username = ?')) {
    //     // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    //     $stmt->bind_param('s', $_POST['username']);
    //     $stmt->execute();
    //     // Store the result so we can check if the account exists in the database.
    //     $stmt->store_result();
    //     if ($stmt->num_rows > 0) {
    //         $stmt->bind_result($id, $password);
    //         $stmt->fetch();
    //         // Account exists, now we verify the password.
    //         // Note: remember to use password_hash in your registration file to store the hashed passwords.
    //         if ($_POST['password'] === $password) {
    //             // Verification success! User has logged-in!
    //             // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
    //             session_regenerate_id();
    //             $_SESSION['loggedin'] = TRUE;
    //             $_SESSION['name'] = $_POST['username'];
    //             $_SESSION['id'] = $id;
    //             echo 'Welcome ' . $_SESSION['name'] . '!';
    //         } else {
    //             // Incorrect password
    //             echo 'Incorrect username and/or password!';
    //         }
    //     } else {
    //         // Incorrect username
    //         echo 'Incorrect username and/or password!';
    //     }
    //     $stmt->close();
    // }else{
    //     echo 'There was an error';
    // }

    //echo $username. $secretword;

    $username = $_POST['username'];
    $secretword = $_POST['password'];
    $sql = "SELECT * FROM login WHERE username = ? AND secretword = ? LIMIT 1";
    $stmtselect = $conn->prepare($sql);
    $result = $stmtselect->execute([$username, $secretword]);

    if($result){
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0){
            $_SESSION['name'] = $user['firstname'] . ' ' . $user['lastname'];
            $_SESSION['userlogin'] = $user;
            $_SESSION['loggedin'] = "true";
            echo"<script>    window.location.href = 'index.php';</script>";
            echo 'Successfully logged in!';
        }else{
            $_SESSION['loggedin'] = "false";
            echo"<script>    window.location.href = 'index.php';</script>";
        }
    }else{
        echo 'There were errors while connecting to database.';
    } 
?>
