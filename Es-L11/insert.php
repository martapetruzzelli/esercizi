<?php include_once './includes/header.php'; ?>

<main>

<?php

    try{
        $avaiablePostValues = ['flavor', 'price', 'vegan', 'avaiable'];
        include __DIR__ . '/includes/checkPostFields.php';
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }

    try{
        $sql = "INSERT INTO sandwich (flavor, price, vegan, avaiable) VALUES (:flavor, :price, :vegan, :avaiable)";
        
        $query = $db->prepare($sql);

        $query->bindParam(':flavor', $flavor, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_INT);
        $query->bindParam(':vegan', $vegan, PDO::PARAM_BOOL);
        $query->bindParam(':avaiable', $avaiable, PDO::PARAM_BOOL);

        if($query->execute()){

            ?>

<div class="container">
    <div class="row mx-auto mt-5"></div>
        <h2>You created a sandwich!</h2>
        <ul class="my-5">
            <li>Flavor: <?=$flavor?></li>
            <li>Price: <?=$price?>€</li>
            <li>Vegan: <?=$vegan == 1 ? 'Yes' : 'No'?></li>
            <li>Avaiable: <?=$avaiable == 1 ? 'Yes' : 'No'?></li>
        </ul>


<?php
        }else{
            echo $query->errorInfo();
        }

    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }

?>

        <a class="btn btn-primary mb-5" href="add.php"> << Create another sandwich</a> 
        <a class="btn btn-primary mb-5" href="index.php"> << Go to HomePage</a>
    </div>
</div>
</main>

<?php include_once './includes/footer.php'; ?>