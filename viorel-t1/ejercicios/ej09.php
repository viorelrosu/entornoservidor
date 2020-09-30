<?php

$n=0;
echo "Introduce número del 1 al 10: ";
fscanf ( STDIN, "%d\n", $n );

$texto = '';
echo "Introduce formato: ";
fscanf ( STDIN, "%s\n", $texto );


$romano = ['i','ii','iii','iv', 'v', 'vi','vii','viii','ix','x'];
$nombre = ['uno', 'dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez'];
$datos = [ 'romano' => $romano, 'nombre'=>$nombre];

for($i=0; $i<$n; $i++){
    echo $datos[$texto][$i]." ";
}

