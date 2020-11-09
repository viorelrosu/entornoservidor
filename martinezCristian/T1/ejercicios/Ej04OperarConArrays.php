<?php
$arNum = [];
$contador = 0;
echo "Inserte un número";
$num = readline();
$arNum[$contador] = $num;

do {
    echo "Inserte un número";
    $num = readline();
    if ($num != 0) {
        $contador ++;
        $arNum[$contador] = $num;
        
    }
} while ($num != 0);

$suma = 0;
$multi = 1;

echo "Seleccione una opcion + o *";
$selec = readline();
switch ($selec) {
    case "+":
        foreach ($arNum as $valor) {
            $suma += $valor;
        }
        echo "el resultado de la suma es $suma";
        break;
    case "*":
        foreach ($arNum as $valor) {
            $multi *= $valor;
        }
        echo "El resultado de la multiplicación es $multi";
        break;
}

?>