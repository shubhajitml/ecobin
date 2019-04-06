<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "1235";


try {
    $conn = new PDO("mysql:host=$servername;dbname=waste_manage", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>