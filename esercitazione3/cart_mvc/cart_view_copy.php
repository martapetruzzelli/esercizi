<?php

require_once realpath(__DIR__ ."/../product_mvc/product_view.php");
require_once realpath(__DIR__ ."/../cart_mvc/cart_model.php");
require_once realpath(__DIR__ ."/../includes/connection.php");


function create_cart_element(PDO $pdo){
    $products = get_cart_products($pdo);
    if(count($products) == 0){
        echo "<div class=\"alert alert-warning fs-2 text-center mx-auto mt-5\" role=\"alert\">
                    No products<br>
                    Go back to <a href=\"index.php\">Home</a> or visit our <a href=\"products.php\">Shop</a>                 
                </div>";
    }

    if(!empty($_SESSION["cart"])){
?>

    <div class="my-5">
        <h1 class="text-center">Items in your cart</h1>
        <table class="table mt-5">

            <thead>
                <tr>
                    <th>Dish</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($products as $product){
            ?>
                <tr>
                    <td><?=$product["name"]?></td>
                    <td><?=$product["price"]?> €</td>
                    <td><?=$product["quantity"]?></td>
                    <td>
                        <a class="btn btn-danger" href="includes/delete.php?id=<?=$product["id"]?>">Remove from cart</a>
                    </td>
                </tr>
            <?php
            }
            ?>   
            </tbody>
        </table>
    </div>
        <?php
    }
}