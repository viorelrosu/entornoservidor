<?php
$num = 1;
$cont = 0; // contador para ir metiendo los numeros
$sel = ""; // variable de seleccion de operaci�n
$miAr = []; // inicio array para meter datos
$suma = 0;  //variable que guarda todas las sumas
$multi = 1; //variable que guarda las multiplicaciones

while ($num != 0) {
    echo "Introduce un n�mero ";
    fscanf(STDIN, "%d\n", $num);

    if ($num != 0) {
        //$miAr[$cont] = $num;
        $miAr[] = $num; //esta es otra manera de meter directamente valores a un array;
        //$cont ++;
    }
}

echo "\nElige una operaci�n a realizar con los n�meros introducidos: +/* ";
fscanf(STDIN, "%s\n", $sel);

echo "\nLos n�meros introducidos son: "; 
foreach ($miAr as $c){
    echo  "$c ";
}

switch ($sel) {
    case "+":
        foreach ($miAr as $n1) {
            $suma += $n1;
        }
        echo "\nEl resultado de la suma de todos los n�meros introducidos es: $suma";
        break;
    case "*":
        foreach ($miAr as $n2) {
            $multi *= $n2;
        }
        echo "\nEl resultado de la multiplicaci�n de todos los n�meros introducidos es: $multi";
        break;
    default:
        echo "\nOperaci�n no especificada";
        break;
}

?>