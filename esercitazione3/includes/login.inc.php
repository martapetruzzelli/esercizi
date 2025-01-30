<?php
    session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    try{
        require_once "connection.php";
        require_once "../login_mvc/login_model.php";
        require_once "../login_mvc/login_controls.php";

        $errors = [];

        $result = get_user($pdo, $username);


        if(is_input_empty($username, $password)){
            
            $errors["empty_input"] = "Fill in all fields";

        }
        
        if(is_username_wrong($result)){

            $errors["login_incorrect"] = "Incorrect credentials";

        }
        
        if(!password_verify($password, $result["password"])) {

            $errors["login_incorrect"] = "Incorrect credentials";

        }

        if ($errors) {
            $_SESSION["errors_login"] = $errors;

            header("Location:../login.php");
            die();
        }

        // $newSessionId = session_create_id();
        // $sessionId = $newSessionId . "_" . $result["id"];
        // session_id($sessionId);
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        $_SESSION["last_regeneration"] = time();

        // print_r($result);
        header("Location:../index.php?login=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else {
    header("Location:../index.php");
    die();
}
