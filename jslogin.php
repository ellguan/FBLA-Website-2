<?php
    require_once('config.php');
?>

<?php
    session_start();

    $username = $_POST['username'];
    $secretword = $_POST['secretword'];

    $sql = "SELECT * FROM test WHERE email = ? AND secretword = ? LIMIT 1";
    $stmtselect = $conn->prepare($sql);
    $result = $stmtselect->execute([$username, $secretword]);

    if($result){
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0){
            $_SESSION['userlogin'] = $user;
            echo '1';
        }else{
            echo 'The username or the password does not match an account in our database.';
        }
    }else{
        echo 'There were errors while connecting to database.';
    }
