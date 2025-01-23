<?php
include_once './includes/header.php';
include_once './includes/class-pizza.php';
include_once './includes/pizzeria.php';


try{
   
    $availablePostValues = ['gusto','prezzo','disponibilita'];
   
    include __DIR__ . '/includes/checkPostFields.php';

    $pizza = new Pizza($gusto, $prezzo, $disponibilita);

    $pizzeria = new Pizzeria();
    

    if($pizzeria->addPizza($pizza)){
        ?>

<h2>Pizza creata!</h2>
<ul>
    <li>Gusto: <?=$gusto?></li>
    <li>Prezzo: <?=$prezzo?> €</li>
    <li>Disponibile: <?=$disponibilita == 1 ? 'Si' : 'No'?></li>
</ul>

        <?php
    }
    
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}


//permetto all'utente di tornare indietro
?>

<a class="btn btn-primary" href="add-pizza.php"> << Torna alla pagina di creazione pizze</a> 
<a class="btn btn-primary" href="index.php"> << Torna alla Home</a>

<?php include_once './includes/footer.php';