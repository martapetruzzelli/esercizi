<?php

require_once "./product_mvc/product_view.php";
require_once "cart_model.php";
require_once "./includes/connection.php";


function create_cart_element(PDO $pdo){
    $products = get_cart_products($pdo);
    if(count($products) == 0){
        echo "No products";
    }
    foreach($products as $product){
    ?>
    <div class="col mt-5">
        <div class="card border border-warning rounded-4 bg-dark-subtle shadow-lg text-dark-emphasis">
            <img src="<?php echo $product["img"] ?>" class="card-img-top rounded-4 img-fluid" alt="<?php echo $product["name"] ?>">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $product["name"] ?></h5>
                <h5 class="card-title"><?php echo $product["price"] . "$" ?></h5>

                <form method="POST" class="form-product">
                    <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
                    <input type="number" min="1" name="quantity" readonly value="<?php echo $product["quantity"]?>" class="form-control" />

                    <button
                        class="btn btn-warning shadow-lg text-dark-emphasis w-50 text-center mt-3">Remove from Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
}