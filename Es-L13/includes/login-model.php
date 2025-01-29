<?php

declare(strict_types=1);

function get_user(object $pdo, $username)
{
    $sql = "SELECT * from authsystem WHERE username = :username;";
    $query = $pdo->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}
