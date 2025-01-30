<?php
session_start();
require_once "./includes/connection.php";
require_once "./product_mvc/product_view.php";
require_once "./includes/header.php";
require_once "./order_mvc/order_view.php";

?>

<main class="container text-center my-5">
    <h1>Our Dishes</h1>
    <?php
    create_all_products($pdo);
    check_order_errors();
    ?>
</main>

<?php
require_once "./includes/footer.php";
