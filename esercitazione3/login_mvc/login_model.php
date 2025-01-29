<?php

declare(strict_types= 1);

function get_user(PDO $pdo, $username){
    $sql = "SELECT * FROM users WHERE username = :username;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}