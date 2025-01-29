<?php
    session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


try{

    require_once "connection.php";
    require_once "../signup_mvc/signup_model.php";
    require_once "../signup_mvc/signup_controls.php";

    $errors = [];

    if(is_input_empty($username, $password, $email)){
        $errors["empty_input"] = "Fill in all fields";
    }
    if(is_email_invalid($email)){
        $errors["invalid_email"] = "Invalid email";
    }
    if(is_username_taken($pdo, $username)){
        $errors["username_taken"] = "Username already taken";
    }
    if(is_email_registered($pdo, $email)){
        $errors["email_used"] = "Email already registered";
    }

    if($errors) {
        $_SESSION["errors_signup"] = $errors;

        header ("Location:../signup.php");
        die();
    }

    create_user($pdo, $username, $email, $password);

    $signupdata = [
        "username" => $username,
        "email"=> $email
    ];

    $_SESSION["signup_data"] = $signupdata;

    header("Location:../signup.php?signup=success");

    $pdo = null;
    $query = null;

    die();

}catch(PDOException $e){
    die("Query failed " . $e->getMessage());
}
}else{
    header("Location:index.php");
    die();
}