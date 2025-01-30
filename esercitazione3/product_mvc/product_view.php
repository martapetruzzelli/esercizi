<?php
require_once realpath(__DIR__ ."/../includes/connection.php");
require_once realpath(__DIR__ ."/../product_mvc/product_controls.php");

function create_all_products(PDO $pdo)
{
    $products = is_product_exists($pdo);

    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

    foreach ($products as $product) {
        create_one_product($product);
    }

    echo '</div>';
}

function create_one_product(array $product)
{
    ?>
    <div class="col mt-5">
        <div class="card border border-warning rounded-4 bg-dark-subtle shadow-lg text-dark-emphasis">
            <img src="<?php echo $product["img"] ?>" class="card-img-top rounded-4 img-fluid" alt="<?php echo $product["name"] ?>">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $product["name"] ?></h5>
                <h5 class="card-title"><?php echo $product["price"] . "$" ?></h5>

                <p class="card-text"><?php echo $product["description"] ?></p>
                <form action="includes/cart.inc.php" method="POST" class="form-product">
                    <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
                    <input type="number" min="1" value="1" name="quantity" class="form-control" />
                    <button class="btn btn-warning shadow-lg text-dark-emphasis w-50 text-center mt-3">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
}