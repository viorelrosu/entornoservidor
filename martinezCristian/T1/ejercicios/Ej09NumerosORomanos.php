<?php
$arrBaraja = [
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

echo "Introduce un número del 1 al 10 ";
$num = readline();

echo "Elige un formato nombre/romano ";
$formato = readline();

for ($i = 0; $i < $num; $i ++) {
    echo $arrBaraja[$formato][$i] . "";
}

?>
