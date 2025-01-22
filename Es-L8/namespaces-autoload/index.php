<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Utente;

$utenteConnesso = new Utente('Mario');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?=$utenteConnesso->saluto()?></h1>
    
</body>
</html>