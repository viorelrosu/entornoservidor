<?php

$barajaAr = [
    "as",
    "dos",
    "tres",
    "cuatro",
    "cinco",
    "seis",
    "siete",
    "sota",
    "caballo",
    "rey"
];

echo "Introduce n: ";
fscanf(STDIN, "%d\n", $n);

for ($i = 0; $i < $n; $i ++){
    echo ($barajaAr[$i%10]).' ';
}

?>