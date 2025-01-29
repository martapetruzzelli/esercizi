<?php include_once './includes/header.php';
include_once './includes/functions.php'; 

try{

    $avaiablePostValues = ['id', 'flavor', 'price', 'vegan', 'avaiable'];
    include __DIR__ . '/includes/checkPostFields.php';

    if(updateSandwich($flavor, $price, $vegan,$avaiable, $id)){
        header("Location: index.php?message=Sandwich edited");
    }


}catch(Exception $e){
    echo $e->getMessage();
}


include_once './includes/footer.php';