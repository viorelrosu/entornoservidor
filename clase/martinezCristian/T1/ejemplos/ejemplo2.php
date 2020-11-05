<?php
// $a = 18; // ejemplo para hacer casting floor (dándonos el entero mas cercano hacia abajo)
// echo floor($a) / 18;

// echo cell($a) / 18; // ejemplo " " casting cell (dándonos el entero ma cercano hacía arriba)

// echo round($a) / 18; // ejemplo redondeando a entero

// conparativa de caracteres
$prueba1 = ah;
$prueba2 = bj;
if ($prueba1 < $prueba2) {
    echo "SI ES MENOR";
} else {
    echo "NO ES MENOR";
}

echo "\n";

$a1 = 3;
$b1 = "3";                      //pornografía PHP

echo ($a1 == $b1) ? "SI" : "NO";  //ejemplo comparando distintos tipos de dato peor con le mismo valor interno

echo "\nejemplo else: ";

$a2 = 10;
$b2 = 20;

if ($a2 < 25) { // ejemplo if
    echo "1";
} else {
    echo "2";
}
echo "\nejemplo else if: ";

if ($b2 > 39) {
    echo "2";
} else if ($b2 == 20) {  //ejemplo else if
    echo "3";
} else {
    echo 5;
}

?>
