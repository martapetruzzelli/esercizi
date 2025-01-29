<?php
require_once "includes/signup-view.php";
require_once "includes/login-view.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <main class="container">
        <h3>
            <?php
            output_username();
            ?>
        </h3>
        <?php
        if (!isset($_SESSION["user_id"])) { ?>
        <h3>Log In</h3>
        <form action="includes/login.php" method ="POST">

            <label for="username">Username</label>
            <input type="text" id="username" class="form-comtrol" name="username">

            <label for="pwd">Password</label>
            <input type="password" id="password" class="form-comtrol" name="pwd">

            <button class="btn btn-primary mt-3">Log In</button>

        </form>
         <?php } ?>
         
        <?php
        check_login_errors();
        ?>

        <h3>Sign Up</h3>

        <form action="includes/signup.php" method="POST">
            <?php signup_inputs(); ?>
            <button class="btn btn-primary mt-3">Sign Up</button>
        </form>
        
        <?php
        check_signup_errors();
        ?>

        <h3>Log Out</h3>
        <form action="includes/logout.php" method="POST">
            <button class="btn btn-primary mt-3">Log Out</button>
        </form>

        

    </main>

</body>
</html>