<?php

$hostname = 'localhost';
$dbName = 'login-test';
$dbUser = 'Marta';
$password = 'password';

try{

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbName", $dbUser, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die;
}