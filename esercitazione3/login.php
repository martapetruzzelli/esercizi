<?php
session_start();

require_once "./includes/header.php";
require_once "./includes/connection.php";
require_once "./login_mvc/login_view.php";

?>
<main class="container my-5">
    <?php
    if(isset($_SESSION["user_id"])){
        echo "<div class=\"alert alert-danger text-center fs-4\" role=\"alert\">
            Already logged in<br>
            Go back to <a href=\"index.php\" class=\"text-decoration-none\">Home</a> or visit our <a href=\"products.php\" class=\"text-decoration-none\">Shop</a>
        </div>";
    }
    ?>
    <h1 class="text-center">Log In</h1>
    <form action="includes/login.inc.php" method="POST">
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="username" id="name" placeholder="Enter name">
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary my-4">Submit</button>
        <?php
        check_login_errors();
        ?>
    </form>
</main>
<?php
require_once "./includes/footer.php";