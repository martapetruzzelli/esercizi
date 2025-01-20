<?php

$numeri = [];

for ($i = 1; $i < 20; $i++) {
    array_push($numeri, rand(1, 100));
}

print_r($numeri);
echo implode(' ', $numeri);

echo '<hr>';

$pari = array_filter($numeri, function ($n) {
    return $n % 2 == 0;
});
$dispari = array_filter($numeri, function ($n) {
    return $n % 2;
});

echo implode(' ', $pari);

echo '<br>';

echo implode(' ', $dispari);