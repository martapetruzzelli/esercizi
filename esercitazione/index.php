<?php require './libreria.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <form>
        <div class="form-group">
            <label for="formGroupExampleInput">Titolo</label>
            <input type="text" name="titolo" class="form-control" placeholder="Titolo">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Autore</label>
            <input type="text" name="autore" class="form-control" placeholder="Autore">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Anno</label>
            <input type="number" name="anno" class="form-control" placeholder="Anno">
        </div>
        <div class="form-group">
            <select class="form-select" name="disponibilita" aria-label="Default select example">
                <option selected>Disponibilità</option>
                <option value="1">Disponibile</option>
                <option value="0">Assente</option>
            </select>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Inserisci libro</button>
        </div>
    </form>

    <?php

    if(!empty($_GET)){

    $libreria1 = new Libreria();

    $titolo = $_GET['titolo'] ?? '';
    $autore = $_GET['autore'] ?? '';
    $anno = $_GET['anno'] ?? '';
    $disponibilita = $_GET['disponibilita'] ?? '';
    $error = false;

    if (empty($titolo) || empty($autore) || empty($anno) || empty($disponibilita)) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Fill in all fields!</div>";
        $error = true;
    }


    if (!$error) {
        $libro = new Libro($titolo, $autore, $anno, $disponibilita);
        $isWrite = $libreria1->aggiungoLibro($libro);
        if ($isWrite) {
            echo "<div class=\"alert alert-success fs-2 text-center mx-auto mt-5\" role=\"alert\">
                    Conferma il tuo libro:<br>
                    Il titolo è : $titolo <br>
                    L'autore è : $autore<br>
                    L'anno di publicazione è : $anno <br>
                </div>";
        }

    }


    };

    ?>

</body>

</html>