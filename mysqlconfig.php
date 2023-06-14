<?php

$servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "useraccounts";
     
    // connect the database with the server
    $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }