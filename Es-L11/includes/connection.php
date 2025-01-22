<?php

try{
    $hostName = 'localhost';
    $dbName = 'crud-4-24';
    $dbUser = 'Marta';
    $dbPassword = 'password';
    
    $db = new PDO ("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword);

}catch(Exception $e){

    echo "Error: ". $e->getMessage();
    exit;

}