<?php
$a = 0;
$b = 0;

echo "Introduce el n�mero de veces a repetir los numeros\n";
fscanf(STDIN, "%d\n", $a);
echo "Introduce el n�mero tope que salen\n";
fscanf(STDIN, "%d\n", $b);

for ($lin = 0; $lin < $a; $lin ++) {

    for ($nMax = 0; $nMax < $b; $nMax ++) {
        echo $nMax;
    }
    echo " "; 
}
?>