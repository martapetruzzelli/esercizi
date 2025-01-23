<?php include_once './includes/header.php'; 
include_once './includes/class-pizza.php';
include_once './includes/pizzeria.php';


if(!isset($_GET['id'])){
    header('Location: index.php');
    exit;
}

try{
    
    $pizzeria = new Pizzeria();

    if($pizzeria->removePizzaById($_GET['id'])) {

        header("Location: index.php?message=Pizza eliminata");

    }


}catch(Exception $e){
    echo $e->getMessage();
}


