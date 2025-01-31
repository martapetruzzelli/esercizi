<?php
session_start();


if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

require_once realpath(__DIR__ ."/includes/header.php");
require_once realpath(__DIR__ ."/includes/connection.php");
require_once realpath(__DIR__ ."/cart_mvc/cart_view_copy.php");

?>
<main class="container">

<?php

if(!isset($_SESSION["user_id"])){
    die("<div class=\"alert alert-danger fs-5 text-center mx-auto mt-5\" role=\"alert\">
    You must be logged in to shop.<br>
    <a href=\"login.php\">Log In</a> to coninue shopping or go back to <a href=\"index.php\" class=\"text-decoration-none\">Home</a>                 
</div>");
}else{
create_cart_element($pdo);
?>

    <div class="text-center mt-5">
        <a href="includes/order.inc.php" class="btn btn-warning">
            Send Order
        </a>
    </div>

</main>

<?php
}

require_once realpath(__DIR__ ."/includes/footer.php");
