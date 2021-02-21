<?php
    $host = '127.0.0.1';
    $dbname = 'loginphp';
    $username = 'root';
    $password = 'root';
 
try {
    $conn = new PDO("mysql:host=$host;port=8889;dbname=$dbname", $username, $password);
    //echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}