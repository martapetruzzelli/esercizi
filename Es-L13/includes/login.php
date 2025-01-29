<?php

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once "connection.php";
        require_once "login-model.php";
        require_once "login-controls.php";

        $errors = [];

        if(is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields";
        }

        $result = get_user($pdo, $username);

        if(is_username_wrong($result) || is_password_wrong($password, $result["password"])){
            $errors["login_incorrect"] = "Incorrect login credentials";
        }

        session_start();
        if($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location:../index.php");
            die();
        }

        header("Location:../index.php?login=success");

        $pdo = null;
        $query = null;
        die();

    } catch(PDOException $e) {
        die("query failed: " . $e->getMessage());
    }
}else {
    header("Location:../index.php");
    die();
}