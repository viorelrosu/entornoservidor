<?php
$suma=0;
$multiplicacion=1;
do{
    echo "\nIntroduce n: ";
    fscanf(STDIN, "%d\n", $n);
    $suma=$suma+$n;
    if($n!=0){
    $multiplicacion=$multiplicacion*$n;
    }
}while($n!=0);

echo "\n�Operaci�n?";
fscanf(STDIN, "%s\n", $s);
switch($s){
    case "sumar":
       echo "\nLa suma vale $suma";
       break;
    case "multiplicar":
        echo "\nLa multiplicaci�n vale $multiplicacion";
        break;
    default: 
        echo "\nERROR";
        break;
}
?>