<?php

require_once realpath(__DIR__ ."/../product_mvc/product_view.php");
require_once realpath(__DIR__ ."/../cart_mvc/cart_model.php");
require_once realpath(__DIR__ ."/../includes/connection.php");


function create_cart_element(PDO $pdo){

    $products = get_cart_products($pdo);
    if(count($products) == 0){
        echo "<div class=\"alert alert-warning fs-4 text-center mx-auto mt-5\" role=\"alert\">
                    Cart empty.<br>
                    Go back to <a href=\"index.php\" class=\"text-decoration-none\">Home</a> or visit our <a href=\"products.php\" class=\"text-decoration-none\">Shop</a>                 
                </div>";
    }

    if(!empty($_SESSION["cart"])){
        $total = array_reduce($products, function($acc, $el){
            return $acc + ($el['price'] * $el['quantity']);
        },0);
?>

    <div class="my-5 px-5">
        <h1 class="text-center">Items in your cart</h1>
        <table class="table mt-5">

            <thead>
                <tr>
                    <th>Dish</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($products as $product){
                $subTotal = $product['quantity'] * $product['price'];
            ?>
                <tr>
                    <td><?=$product["name"]?></td>
                    <td><?=$product["price"]?> €</td>
                    <td><?=$product["quantity"]?></td>
                    <td><?=$subTotal?>€</td>
                    <td class="text-center">
                        <a class="btn btn-danger" href="includes/delete.php?id=<?=$product["id"]?>">Remove from cart</a>
                    </td>
                </tr>
            <?php
            }
            ?>   
            </tbody>
            <tfoot>
            <td colspan="3"><b>Order total:</b></td>
            <td><?=$total?>€</td>
        </tfoot>
        </table>
    </div>
        <?php
    }

}

