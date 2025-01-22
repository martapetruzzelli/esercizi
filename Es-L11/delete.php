<?php include_once './includes/header.php'; ?>

<main>

    <?php

        if(!isset($_GET['id'])){
            header('Location: index.php');
            exit;
        }

        $sql = "DELETE FROM sandwich WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindParam(":id", $_GET["id"]);

        if($query->execute()){

            header("Location: index.php?message=Sandwich deleted succesfully");

        }

    ?>

</main>

<?php include_once './includes/footer.php'; ?>