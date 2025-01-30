<?php
session_start();

require_once "./includes/header.php";
require_once "./includes/connection.php";
require_once "./signup_mvc/signup_view.php";

?>
<main class="container my-5">
    <h1 class="text-center">Sign up</h1>
    <form action="includes/signup.inc.php" method="POST">
        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="username" id="name" placeholder="Enter name">
        </div>
        <div class="form-group mt-3">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
        <?php
        check_signup_errors();
        ?>
    </form>
</main>
<?php
require_once "./includes/footer.php";