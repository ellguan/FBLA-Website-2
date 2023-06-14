<?php
require_once('config.php');
session_start();
if(isset($_POST)){
    $noodleid = $_POST['id'];
    $sql = "DELETE FROM noodles WHERE id = ?";
    $stmtinsert = $conn->prepare($sql);
    $result = $stmtinsert->execute([$noodleid]);
    if($result){
        echo '1';
    }else{
        echo 'There were errors while saving the data.';
    }

}