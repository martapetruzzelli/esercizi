<?php include_once './includes/header.php';
include_once './includes/functions.php'; 

try{
        $avaiablePostValues = ['flavor', 'price', 'vegan', 'avaiable'];
        include __DIR__ . '/includes/checkPostFields.php';

        $sFlavor = htmlspecialchars($flavor);
        
        if(!$sPrice = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)){
            header("Location: add.php?message=Price must be a number");
        }
        $sVegan = filter_var($vegan, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        
        if($sVegan === NULL){
            header("Location: add.php?message=Select option for vegan");
        }

        // $filters = [
        //     $price => FILTER_VALIDATE_FLOAT,
        //     $vegan => FILTER_VALIDATE_BOOLEAN,
        //     $avaiable => FILTER_VALIDATE_BOOLEAN
        // ];

        // $result = filter_var_array($avaiablePostValues, $filters);
        // ['price' => $sPrice, 'vegan' => $sVegan, 'avaiable' => $sAvaiable] = $result;

        createSandwich($sFlavor, $sPrice, $sVegan,$avaiable);

    ?>
<main>
    <div class="container">
        <div class="row mx-auto mt-5"></div>
            <h2>You created a sandwich!</h2>
            <ul class="my-5">
                <li>Flavor: <?=$sFlavor?></li>
                <li>Price: <?=$sPrice?>€</li>
                <li>Vegan: <?=$sVegan == 1 ? 'Yes' : 'No'?></li>
                <li>Avaiable: <?=$avaiable == 1 ? 'Yes' : 'No'?></li>
            </ul>
            <a class="btn btn-primary mb-5" href="add.php"> << Create another sandwich</a> 
            <a class="btn btn-primary mb-5" href="index.php"> << Go to HomePage</a>
        </div>
    </div>
</main>
    <?php
        

    }catch(Exception $e){
        echo $e->getMessage();
    }




include_once './includes/footer.php'; ?>