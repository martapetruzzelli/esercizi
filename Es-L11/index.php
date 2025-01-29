<?php include_once './includes/header.php'; 
include_once './includes/functions.php'; ?>

<main>

<?php if(isset($_GET['message'])): ?>
<div class="alert alert-success mx-5 px-5">
    <?=$_GET['message'];
    if(isset($_GET['id'])){ ?>
        <button class="btn btn-success mx-5" href="restore.php?id=<?=$_GET['id']?>">Undo</button>
    <?php } ?>
</div>

<?php endif; ?>
    
<?php

try{
    $rows = getAllSandwich();
}catch(Exception $e){
    echo $e->getMessage();
}

    ?>
    <div class="container">
    <table class="table mx-auto text-center">

        <thead>
            <tr>
                <th>#</th>
                <th>Flavor</th>
                <th>Price</th>
                <th>Vegan</th>
                <th>Avaiable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($rows as $sandwich):
                    [
                        'id' => $id,
                        'flavor' => $flavor,
                        'price' => $price,
                        'vegan' => $vegan,
                        'avaiable' => $avaiable,
                    ] = $sandwich;
            ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$flavor?></td>
                <td><?=$price?></td>
                <td><?=$vegan == 1 ? 'Yes' : 'No'?></td>
                <td><?=$avaiable == 1 ? 'Yes' : 'No'?></td>
                <td>
                    <a class="btn btn-warning" href="edit.php?id=<?=$id?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?=$id?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    </div>
    <?php


?>

</main>

<?php include_once './includes/footer.php'; ?>