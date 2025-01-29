<?php

function is_input_empty(string $username, string $password):bool{

    return empty($username) || empty($password);

}

function is_username_wrong(PDO $pdo, string $username):bool{
    if(!get_user($pdo, $username)){
        return true;
    }else{
        return false;
    }
}

function is_password_wrong(string $password, string $hashedPassword):bool{

    if(!password_verify($password, $hashedPassword)){
        return true;
    }else{
        return false;
    }
}
