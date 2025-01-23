<?php include_once './includes/header.php'; ?>
<?php include_once './includes/functions.php'; ?>


<?php

    if(!isset($_GET['id'])){
        header('Location: index.php');
        exit;
    } 


    try {
        [
            'flavor' => $flavor,
            'price' => $price,
            'vegan' => $vegan,
            'avaiable' => $avaiable,
        ] = getSandwichById($_GET['id']);

        } catch (Exception $e) {

            echo $e->getMessage();
            
        }

?>

<main class="container">

    <div class="row mx-auto">

        <div class="col-12">

            <h1>Edit sandwich</h1>

            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <label for="flavor">Flavor</label>
                <input type="text" value="<?=$flavor ?>" name="flavor" id="flavor" class="form-control" placeholder="flavor">

                <label for="price">Price</label>
                <input type="number" value="<?=$price ?>" name="price" id="price" class="form-control" placeholder="price">

                <label for="vegan">Is it vegan?</label>
                <select value="<?=$vegan ?>" name="vegan" id="vegan" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="avaiable">Avaiable</label>
                <select value="<?=$avaiable ?>" name="avaiable" id="avaiable" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <button class="mt-3 btn btn-primary">Save</button>

            </form>

        </div>



</main>

<?php include_once './includes/footer.php'; ?>