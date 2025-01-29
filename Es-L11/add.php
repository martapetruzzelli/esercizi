<?php include_once './includes/header.php'; ?>


<main class="container">

<?php if(isset($_GET['message'])): ?>
<div class="alert alert-warning mx-5 px-5">
    <?=$_GET['message']; ?>
</div>
<?php endif; ?>

    <div class="row mx-auto">

        <div class="col-12">

            <form action="insert.php" method="POST">

                <label for="flavor">Flavor</label>
                <input type="text" name="flavor" id="flavor" class="form-control" placeholder="flavor">

                <label for="price">Price</label>
                <input type="number" step="any" name="price" id="price" class="form-control" placeholder="price">

                <label for="vegan">Is it vegan?</label>
                <select name="vegan" id="vegan" class="form-control">
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="avaiable">Avaiable</label>
                <select name="avaiable" id="avaiable" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <button class="mt-3 btn btn-primary">Save</button>

            </form>

        </div>

    </div>

</main>

<?php include_once './includes/footer.php'; ?>