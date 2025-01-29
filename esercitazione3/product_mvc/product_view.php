<?php
require_once "./includes/connection.php";
require_once "products_controls.php";

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
    <div class="col">
        <div class="card border border-warning rounded-4 bg-dark-subtle shadow-lg text-dark-emphasis">
            <img src="<?php echo $product["img"] ?>" height="100" class="card-img-top rounded-4" alt="<?php echo $product["name"] ?>">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $product["name"] ?></h5>
                <h5 class="card-title"><?php echo $product["price"] . "$" ?></h5>

                <p class="card-text"><?php echo $product["description"] ?></p>
                <form action="" method="POST" class="form-product">
                    <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
                    <input type="number" min="0" name="quantity" class="form-control" />
                    <button
                        class="btn btn-warning shadow-lg text-dark-emphasis w-50 text-center">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php
}