<?php
session_start();
require_once realpath(__DIR__ ."/../order_mvc/order_model.php");
require_once realpath(__DIR__ ."/../cart_mvc/cart_model.php");
require_once realpath(__DIR__ ."/../includes/connection.php");
require_once realpath(__DIR__ ."/../send_mail.php");

if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])){
    header("Location:../products.php");
}else if(insert_order($pdo, $_SESSION["user_id"])){

    $products = get_cart_products($pdo);
    send_mail($pdo, $products);
    $_SESSION["cart"] = [];
    header("Location:../cart.php?order=sent");

}else{
    header("Location:../cart.php?order=error");
}