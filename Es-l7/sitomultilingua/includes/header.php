<?php require __DIR__ . "/lang-switch.php" ?>
<?php require "./lang/$lang.php" ?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
    <header class="d-flex justify-content-center py-3">
        <?php include 'nav.php' ?>
    </header>