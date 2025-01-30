<?php

function output_username(){
    if(isset($_SESSION["user_id"])){
        echo "<a href=\"account.php\"><i class=\"bi bi-person-circle text-light\"></i></a>
               Welcome " . $_SESSION["user_username"];
    }else{
        echo "You are not logged in";
    }
}

function check_login_errors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        foreach($errors as $error){
            echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>";
        }

        unset($_SESSION["errors_login"]);
    }else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br>";
        echo "<div class=\"alert alert-success fs-2 text-center mx-auto mt-5\" role=\"alert\">
                    Login success<br>
                    Go back to <a href=\"index.php\">Home</a> or visit our <a href=\"products.php\">Shop</a>                 
                </div>";
    }
}