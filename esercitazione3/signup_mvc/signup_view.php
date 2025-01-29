<?php

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        foreach($errors as $error){
            echo "Error: $error";
        }

        unset($_SESSION["errors_signup"]);
    }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo "<div class=\"alert alert-success fs-2 text-center mx-auto mt-5\" role=\"alert\">
                    Signup success<br>                   
                </div>";
    }
}