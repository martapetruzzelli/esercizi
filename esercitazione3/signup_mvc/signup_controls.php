<?php

function is_input_empty(string $name, string $password, string $email):bool{

    return (empty($name) || empty($password) || empty($email));

}

function is_email_invalid(string $email):bool{
    return (!filter_var($email, FILTER_VALIDATE_EMAIL));
}

function is_username_taken(PDO $pdo, string $email):bool{
    if(get_username($pdo, $email)){
        return true;
    }else{
        return false;
    }
}

function is_email_registered(PDO $pdo, string $email):bool{

    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}

function create_user(PDO $pdo, string $username, string $email, string $password){
    set_users($pdo, $username, $email, $password);
}