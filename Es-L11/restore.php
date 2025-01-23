<?php include_once './includes/header.php'; ?>
<?php include_once './includes/functions.php'; ?>

<main>

    <?php

        if(!isset($_GET['id'])){
            header('Location: index.php');
            exit;
        }

        archiveSandwich($_GET['id'], 'sandwich', 'deleted');

        deleteSandwich($_GET['id'], 'deleted');

    ?>

</main>

<?php include_once './includes/footer.php'; ?>
