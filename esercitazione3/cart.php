<?php
session_start();

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

require_once "./includes/header.php";
require_once "./includes/connection.php";
require_once "./cart_mvc/cart_view.php";


create_cart_element($pdo);

?>

<div>
    <a href="includes/order.inc.php" class="btn btn-warning">
        Send Order
    </a>
</div>