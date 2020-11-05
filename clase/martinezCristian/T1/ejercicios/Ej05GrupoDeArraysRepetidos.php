<?php
$contador = 0;
$arrBaraja = [
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

echo "Introduce un número: ";
$num = readline();

if ($num > 0) {
    for ($i = 0; $i < $num; $i ++) {
        if ($contador > 9) {
            $contador = 0;
        }
        echo $arrBaraja[$contador] . " ";
        $contador ++;
    }
} else {
    echo "Introduce un número mayor a 0";
}
?>