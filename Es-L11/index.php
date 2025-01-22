<?php include_once './includes/header.php'; ?>

<main>

<?php if(isset($_GET['message'])): ?>
<div class="alert alert-success mx-5 px-5">
    <?=$_GET['message'] ?>
</div>

<?php endif; ?>

<?php

$sql = "SELECT * FROM sandwich ORDER BY price DESC";

$query = $db->prepare($sql);

if($query->execute()){

    $row = $query->fetchAll(PDO::FETCH_ASSOC);

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
                foreach($row as $sandwich):
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
}

?>

</main>

<?php include_once './includes/footer.php'; ?>