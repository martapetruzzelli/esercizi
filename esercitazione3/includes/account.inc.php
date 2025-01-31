<?php
require_once "connection.php";

function create_users_order(PDO $pdo, $id){
    try{
        $sql = "SELECT
            orders.id AS order_id,
            users.username,
            products.name AS products_name,
            order_items.quantity,
            products.price,
            orders.date
        FROM
            users 
        INNER JOIN
            orders ON users.id = orders.user_id
        INNER JOIN
            order_items ON orders.id = order_items.order_id
        INNER JOIN
            products ON products.id = order_items.product_id
        WHERE users.id = $id;
        ";

        $query = $pdo->query($sql);

        $orders = $query?->fetchAll(PDO::FETCH_ASSOC);

        if(!$orders){
            $orders = [];
        };
        return $orders;
    }catch(PDOException $e){
        echo $query->errorInfo();
    }
}




