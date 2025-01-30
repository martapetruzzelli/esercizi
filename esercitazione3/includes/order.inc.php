<?php
session_start();
require_once "../order_mvc/order_model.php";


if(!isset($_SESSION["cart"]) || empty($_SESSION["cart"])){
    header("Location:../products.php");
}
if(insert_order($pdo, $_SESSION["user_id"])){

    $_SESSION["cart"] = [];
    header("Location:../index.php?order=sent");

}else{
    header("Location:../cart.php?order=error");
}