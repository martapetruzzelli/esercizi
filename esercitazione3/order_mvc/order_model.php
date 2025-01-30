<?php
require_once realpath(__DIR__ ."/../cart_mvc/cart_model.php");

function insert_order(PDO $pdo, int $user_id):bool{
    
    try{

        $pdo->beginTransaction();

        $products = get_cart_products($pdo);
        $sql = "INSERT INTO orders (user_id, date) VALUES (:user_id, :date);";
        $query = $pdo->prepare($sql);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $date = date("Y-m-d H:i:s");
        $query->bindParam(":date", $date, PDO::PARAM_STR);
        $query->execute();

        $order_id = $pdo->lastInsertId();

        foreach($products as $product){
        $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity);";
        $query = $pdo->prepare($sql);
        $query->bindParam(":order_id", $order_id, PDO::PARAM_INT);
        $query->bindParam(":product_id", $product["id"], PDO::PARAM_INT);
        $query->bindParam(":quantity", $product["quantity"], PDO::PARAM_INT);

        $query->execute();
        }

        $pdo->commit();
        return true;

    }catch(PDOException $e){
        $pdo->rollBack();
        return false;
    }

}