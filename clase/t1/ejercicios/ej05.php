<?php
$cartas = [ 'as', 'dos', 'tres', 'cuatro', 'cinco','seis', 'siete', 'sota', 'caballo', 'rey' ];

$n=0;
echo "Introduce n: ";
fscanf ( STDIN, "%d\n", $n );

$j=0;
for($i=0; $i<=$n-1; $i++){
    echo $cartas[$i%10].' ';
}