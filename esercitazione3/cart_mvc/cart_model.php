<?php
require_once realpath(__DIR__ ."/../product_mvc/product_model.php");
require_once realpath(__DIR__ ."/../includes/connection.php");


function get_cart_products_id(){
    $ids = array_map(function ($product){
        return $product["id"];
    }, $_SESSION["cart"]);
    return implode(",", $ids);
}

function get_cart_products(PDO $pdo){
    
    $ids = get_cart_products_id();
    if(!$ids){
        return [];
    }

    $products = get_products_by_id($pdo, $ids);
    foreach($products as &$product){
        $product_id = $product["id"];
        $quantity = $_SESSION["cart"][$product_id]["quantity"];
        $product["quantity"] = $quantity;
    }
    return $products;
}

function get_cart_quantity(){
    return array_reduce($_SESSION["cart"], function($acc, $el){
        return $acc + $el['quantity'];
    },0);
}

