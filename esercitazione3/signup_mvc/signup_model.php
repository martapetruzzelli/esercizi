<?php
function get_username(PDO $pdo, string $username)
{
    $sql = "SELECT username FROM users WHERE username = :username;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query?->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(PDO $pdo, string $email){
    $sql = "SELECT email FROM users WHERE email = :email;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->execute();

    $result = $query?->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_users(PDO $pdo, string $username, string $email, string $password){
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password);";
    $query = $pdo->prepare($sql);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->bindParam(":password", $hashedPassword, PDO::PARAM_STR);

    $query->execute();
}