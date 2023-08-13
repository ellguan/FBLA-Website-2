<?php
    require_once('config.php');
    session_start();
?>

<?php
    if(isset($_POST)){
        $firstname   = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $email       = $_POST['email'];
        $username       = $_POST['username'];
        $secretword1  = ($_POST['secretword']);
        $secretword1 = password_hash($secretword1, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO login2 (firstname, lastname, email, username, secretword ) values(?,?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $username, $secretword1]);
        if($result){
            $_SESSION['registered'] = "true";
            echo '<script>window.location.href = "index.php";</script>';
        }else{
            $_SESSION['registered'] = "false";
            echo '<script>window.location.href = "index.php";</script>';
        }
    }else{
        echo 'No data';
    }
