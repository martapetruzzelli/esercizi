<?php

require_once "./includes/connection.php";
require_once "./product_mvc/product_view.php";
require_once "./includes/header.php";

?>

<h1>Our Dishes</h1>
<?php
create_all_products($pdo);
