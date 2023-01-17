<?php
    require_once('config.php');
?>

<?php
    if(isset($_POST)){
        $firstname   = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $email       = $_POST['email'];
        $secretword1  = ($_POST['secretword']);
        
        $sql = "INSERT INTO login (firstname, lastname, email, secretword ) values(?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $email, $secretword1]);
        if($result){
            echo 'We are excited to have you here! :)';
        }else{
            echo 'There were errors while saving the data.';
        }
    }else{
        echo 'No data';
    }
