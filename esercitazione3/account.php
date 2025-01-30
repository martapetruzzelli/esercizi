<?php

session_start();

require_once realpath(__DIR__ ."/includes/header.php");
require_once realpath(__DIR__ ."/includes/connection.php");
require_once realpath(__DIR__ ."/includes/account.inc.php");

?>
<main class="container my-5">
    <h1 class="text-center my-5">Welcome <?=$_SESSION["user_username"]?></h1>
    
    <h3 class="text-center mb-3">Your past orders</h3>
    <?php
    
        $myOrder = create_users_order($pdo, $_SESSION["user_id"]);
    
    ?>
    
    <table class="table mb-5">
        <thead>
            <tr>
                <th>Dish</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            $total = array_reduce($myOrder, function($acc, $el){
                return $acc + ($el['price'] * $el['quantity']);
            },0);
    
            foreach($myOrder as $product):
                $subTotal = $product['quantity'] * $product['price'];
                ?>
                <tr>
                    <td><?=$product['products_name']?></td>
                    <td><?=$product['date']?></td>
                    <td>x <?=$product['quantity']?></td>
                    <td><?=$subTotal?>€</td>
                    
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <td colspan="2"><b>Order total:</b></td>
            <td><?=$total?>€</td>
        </tfoot>
    </table>
    
    <?php
    
?>

</main>