<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $sql ="SELECT username FROM authsystem WHERE username = :username;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $sql = "SELECT username FROM authsystem WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $email, string $password){
    $sql = "INSERT INTO authsystem (username, email, password) VALUES (:username, :email, :password);";
    $query = $pdo->prepare($sql);

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":password", $hashedPwd, PDO::PARAM_STR);

    $query->execute();
}