<?php
session_start();

if(!isset($_SESSION["cart"])){
    $_SESSION["cart"] = [];
}

require_once realpath(__DIR__ ."/includes/header.php");
require_once realpath(__DIR__ ."/includes/connection.php");
require_once realpath(__DIR__ ."/cart_mvc/cart_view_copy.php");

?>
<main class="container">

<?php
create_cart_element($pdo);
?>

    <div class="text-center mt-5">
        <a href="includes/order.inc.php" class="btn btn-warning">
            Send Order
        </a>
    </div>

</main>
