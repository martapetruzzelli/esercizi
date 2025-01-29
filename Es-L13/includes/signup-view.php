<?php

declare(strict_types= 1);

function signup_inputs(){
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo  '<label for "username">Username</label>
            <input type="text" id="username" class="form-control" name="username" value=" ' . $_SESSION["signup_data"]["username"] . ' "> ';
    }else{
        echo  '<label for "username">Username</label>
            <input type="text" id="username" class="form-control" name="username">';
    }
    echo  '<label for "password">Password</label>
            <input type="password" id="password" class="form-control" name="password">';
    
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"])) {
        echo  '<label for "email">Email</label>
            <input type="text" id="email" class="form-control" name="email" value=" ' . $_SESSION["signup_data"]["email"] . ' "> ';
    }else{
        echo  '<label for "email">Email</label>
            <input type="email" id="email" class="form-control" name="email">';
    }
}

function check_signup_errors(){
    if (isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo '<br>';
        foreach ( $errors as $error ) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>";
        }

        unset($_SESSION["errors_signup"]);
    }else if(isset($_GET["signup"])&& $_GET["signup"] == "success"){
        echo "<br>";
        echo "<div class=\"alert alert-success fs-2 text-center mx-auto mt-5\" role=\"alert\">
                    Signup success:<br>                   
                </div>";
    }
}