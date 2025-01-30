<?php
session_start();

require_once realpath(__DIR__ ."/../order_mvc/order_model.php");
require_once realpath(__DIR__ ."/../includes/connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $quantity = $_POST["quantity"];
    $id = $_POST["id"];

    if(!empty($quantity) || !empty($id)){
        $_SESSION["order_errors"] = "Specify quantity";
    }

    if(!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }

    $_SESSION["cart"][$id] = [
        "id" => $id,
        "quantity"=> $quantity
    ];

    header("Location:../products.php?order=success");
}else{
    header("Location:../products.php?order=error");
}
