<?php
require_once('config.php');
session_start();

    if(isset($_POST)){
        $noodleid = $_POST['noodleid'];
        $noodleimage = $_POST['noodleimage'];
        $noodlename = $_POST['noodlename'];
        $noodleprice = $_POST['noodleprice'];
        $noodlefilters = $_POST['noodlefilters'];

        $sql = "INSERT INTO noodles (id, image, fullname, price, filters ) values(?,?,?,?,?)";
        $stmtinsert = $conn->prepare($sql);
        $result = $stmtinsert->execute([$noodleid, $noodleimage, $noodlename, $noodleprice, $noodlefilters]);
        if($result){
            $_SESSION['addproduct'] = "true";
            echo '<script>window.location.href = "adminpage.php";</script>';
            echo 'Entry created successfully.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }