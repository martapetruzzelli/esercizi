<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="parole-frase.php?test=1" method="POST">

        <input type="textarea" name="frase" placeholder="inserisci una frase">
        <button>Invia</button>

    </form>

    <?php

    $frase = $_POST['frase'];

    $array = explode(' ', $frase);
    print_r($array);
    echo '<br>';
    echo 'La frase contiene ' . count($array) . ' parole.';


    ?>
</body>
</html>