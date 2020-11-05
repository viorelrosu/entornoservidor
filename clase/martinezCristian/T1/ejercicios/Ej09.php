<?php
$num = 0;
$sel = '';
$arr = [
    "nombre" => [
        "uno",
        "dos",
        "tres",
        "cuatro",
        "cinco",
        "seis",
        "siete",
        "ocho",
        "nueve",
        "diez"
    ],
    "romano" => [
        "i",
        "ii",
        "iii",
        "iv",
        "v",
        "vi",
        "vii",
        "viii",
        "ix",
        "x"
    ]
];

echo "Introduce un número entre 1 y 10: ";
fscanf(STDIN, "%d\n", $num);

echo "Introduce el formato nombre/romano ";
fscanf(STDIN, "%s\n", $sel);

for ($i = 0; $i < $num; $i ++) {

    echo $arr[$sel][$i].' ';
}

?>