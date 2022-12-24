<?php
$servername = "localhost";
$username = "root";
$password = "iwanttofuckoikawashh;)";
$dbname = "useraccounts";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // setting the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>