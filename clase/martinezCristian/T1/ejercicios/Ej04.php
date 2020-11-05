<?php
$num = 1;
$cont = 0; // contador para ir metiendo los numeros
$sel = ""; // variable de seleccion de operación
$miAr = []; // inicio array para meter datos
$suma = 0;  //variable que guarda todas las sumas
$multi = 1; //variable que guarda las multiplicaciones

while ($num != 0) {
    echo "Introduce un número ";
    fscanf(STDIN, "%d\n", $num);

    if ($num != 0) {
        //$miAr[$cont] = $num;
        $miAr[] = $num; //esta es otra manera de meter directamente valores a un array;
        //$cont ++;
    }
}

echo "\nElige una operación a realizar con los números introducidos: +/* ";
fscanf(STDIN, "%s\n", $sel);

echo "\nLos números introducidos son: "; 
foreach ($miAr as $c){
    echo  "$c ";
}

switch ($sel) {
    case "+":
        foreach ($miAr as $n1) {
            $suma += $n1;
        }
        echo "\nEl resultado de la suma de todos los números introducidos es: $suma";
        break;
    case "*":
        foreach ($miAr as $n2) {
            $multi *= $n2;
        }
        echo "\nEl resultado de la multiplicación de todos los números introducidos es: $multi";
        break;
    default:
        echo "\nOperación no especificada";
        break;
}

?>