<?php require_once __DIR__ . '/connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nome = 'Marta';
    $cognome = 'Petruzzelli';
    $email = 'esempio@gmail.com';
    //avrò funzione con scambio di dati che sostituisce i valori nome,cognome, email con quelli inseriti sopra nelle variabili
    //funzione di controllo
    //preparo riga di sql contenente paramentri che rappresentano uno schema della query SQL che verrà inviata al database.
    //utilizzo questo sistema anziché passare direttamente ai valori delle variabili per questioni di sicurezza
    $sql = "INSERT INTO utenti(nome, cognome, email) VALUES (:nome, :cognome, :email)";
    
    //ora chiedo a pdo di elaborare la stringa sql che ho creato 
    $query = $db->prepare($sql);
    //avvio sostituzione paramentri con valori reali in maniera controllata e sicura grazie a pdo
    $query->bindParam(':nome', $nome, PDO::PARAM_STR);
    $query->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);


    if($query->execute()){
        echo 'Utente creato';
    }else{
        echo $query->errorInfo();
    }
    ?>
</body>
</html>