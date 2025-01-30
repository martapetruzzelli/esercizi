<?php

$hostname = 'localhost';
$dbName = 'ecommerce';
$dbUser = 'Marta';
$dbPassword = 'password';

try{

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbName", $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die;
}