<?php require_once "login_mvc/login_view.php";
require_once "cart_mvc/cart_model.php";

$quantity = get_cart_quantity();
?>

    <div class="d-flex flex-wrap align-items-center">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0 justify-content-start">
            <li><a href="index.php" class="nav-link px-2 link text-light">Home</a></li>
            <li><a href="products.php" class="nav-link px-2 link text-light">Products</a></li>
        </ul>
        <div class="d-flex gap-4 align-middle justify-content-end">

                <div class="text-end">
                    <a href="login.php" class="btn btn-outline-light me-2">Login</a>
                    <a href="signup.php" class="btn btn-warning">Sign-up</a>
                </div>

                <div class="text-end">
                    <form action="logout.php" method="POST">
                        <button class="btn btn-warning">Log out</button>
                    </form>
                </div>

                <div class="text-end">
                    <span></span>
                    <a href="cart.php">
                        <button type="button" class="btn btn-warning position-relative">
                            <i class="bi bi-bag text-dark"></i> 
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger"><?=$quantity?> <span class="visually-hidden"></span></span>
                        </button>
                    </a>
                </div>

                <div>
                    <?php
                        output_username();
                    ?>
                </div>

        </div>
    </div>
    