<?php include_once './includes/header.php'; ?>

<?php

    if(!isset($_GET['id'])){
        header('Location: index.php');
        exit;
    }

    $sql = "SELECT * FROM sandwich WHERE id = '" . $_GET['id'] . "'";

    $query = $db->prepare($sql);

    if($query->execute()){

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);

        [
            'flavor' => $flavor,
            'price' => $price,
            'vegan' => $vegan,
            'avaiable' => $avaiable
        ] = $rows[0];

    }else{

        throw new Exception($query->errorInfo());

    }

?>

<main class="container">

    <div class="row mx-auto">

        <div class="col-12">

            <h1>Edit sandwich</h1>

            <form action="update.php" method="POST">

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