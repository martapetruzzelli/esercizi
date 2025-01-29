<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try{

        require_once "connection.php";
        require_once "signup-controls.php";
        require_once "signup-model.php";

        // Error Handlers
        $errors = [];

        if(is_input_empty($username, $password, $email)){
            $errors["empty_input"] = "Fill in all fields";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email!";
        }
        if (username_taken($pdo, $username)) {
            $errors["username_taken"] = "Usename already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        session_start();
        if($errors){
            $_SESSION["errors_signup"] = $errors;

            header("Location:../index.php");
            die();
        }
        create_user($pdo, $username, $email, $password);

        $signupdata = [
            "username"=> $username,
            "email"=> $email
        ];
        $_SESSION["signup_data"] = $signupdata;
        
        header("Location:../index.php?signup=success");

        $pdo = null;
        $query = null;
        die();
    }catch(PDOException $e){
        die("query failed: " . $e->getMessage());
    }
}else{
    header("Location:../index.php");
    die();
}