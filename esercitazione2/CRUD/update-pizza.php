<?php include_once './includes/header.php'; 
include_once './includes/class-pizza.php';
include_once './includes/pizzeria.php';


try{

    $availablePostValues = ['id','gusto','prezzo','disponibilita'];
    include __DIR__ . '/includes/checkPostFields.php';
    
    $pizzeria = new Pizzeria();
    $pizza = new Pizza($gusto, $prezzo, $disponibilita, $id);

    if($pizzeria->updatePizza($pizza)){

        header("Location: index.php?message=Pizza modificata");

    }

}catch(Exception $e){
    echo $e->getMessage();
}


