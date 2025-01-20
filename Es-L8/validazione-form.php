<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="validazione-form.php?test=1" method="POST">
        <input type="text" name="name" placeholder="Scrivi il tuo nome">
        <input type="email" name="email" placeholder="Scrivi la tua e-mail">
        <input type="number" name="age" placeholder="Scrivi la tua età">
        <button>Invia</button>
    </form>
    
    <?php

        $email = $_POST['email'];
        $name = $_POST['name'];
        $age = $_POST['age'];

        if (empty($email) || empty($messaggio) || empty($age)) {
            throw new Exception('Inserisci tutti i dati');
        }else if($age < 0){
            throw new Exception ('L\'età non può essere un numero negativo');
        }else{
            echo 'i dati sono stati inviati correttamente';
        }

    ?>
</body>
</html>