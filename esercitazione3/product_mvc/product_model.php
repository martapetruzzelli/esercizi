<?php


function get_all_products(PDO $pdo): array{
    $sql = "SELECT * FROM products";
    $query = $pdo->query($sql);

    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

function get_products_by_id(PDO $pdo, string $ids): array{
    $sql = "SELECT * FROM products WHERE id IN ($ids)";
    $query = $pdo->query($sql);

    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}

