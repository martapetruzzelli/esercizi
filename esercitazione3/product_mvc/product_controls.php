<?php

require_once realpath(__DIR__ ."/../product_mvc/product_model.php");

function is_product_exists(PDO $pdo){

    try{
        return get_all_products($pdo);
    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}

