<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="calcolo.php?test=1" method="POST">

        <input type="number" name="number1" placeholder="inserisci un numero">
        <input type="number" name="number2" placeholder="inserisci un altro numero">

        <button>Invia</button>
    </form>

<?php
class Numeri{

public static function somma(int|float ...$numeri){
    return array_sum($numeri);
}

public static function sottrazione($a, $b){
    return $a - $b;
}
public static function moltiplicazione(int|float ...$numeri){
    return array_product($numeri);
}

public static function divisione($a, $b){
    return $a / $b;
}

}

$num1 = $_POST['number1'];
$num2 = $_POST['number2'];

echo Numeri::somma($num1, $num2);
echo '<br>';
echo Numeri::sottrazione($num1, $num2);
echo '<br>';
echo Numeri::moltiplicazione($num1, $num2);
echo '<br>';
echo Numeri::divisione($num1, $num2);

?>
</body>
</html>