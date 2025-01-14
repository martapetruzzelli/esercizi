<?php

// Calcolo dell'area di un rettangolo
declare(strict_types=1);
function calculateRectangleArea(int|float $length, int|float $width):int|float {
    return $length * $width;
}

echo calculateRectangleArea(length:5, width:2.7);

echo "<hr>";

// Concatenazione di stringhe
function concatenateStrings(string $first, string $second, string $separator = ' '): string {
    return $first . $separator . $second;
}
echo concatenateStrings(second:"visitatore", first:"Ciao");

echo "<hr>";

// Calcolo della media di numeri
function calculateAverage(array $numbers):float|int {
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $count > 0 ? $sum / $count : 0;
}

echo calculateAverage(numbers:[-55,2.8,16]);

echo "<hr>";

// Verifica della maggiore età
function isAdult(int $age, int $legalAge = 18): string {
    return $age >= $legalAge ? 'maggiorenne' : 'minorenne';
    // return $age >= $legalAge;
}

echo isAdult(age:15);

echo "<hr>";

// Calcolo del massimo di due numeri
function getMax(int|float $a, int|float $b): int|float {
    return ($a > $b) ? $a : $b;
}

echo getMax(b:5, a:7.2);