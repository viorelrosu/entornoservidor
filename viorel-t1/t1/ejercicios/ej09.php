<?php

$n=0;
echo "Introduce n�mero del 1 al 10: ";
fscanf ( STDIN, "%d\n", $n );

$texto = '';
echo "Introduce formato: ";
fscanf ( STDIN, "%s\n", $texto );

$datos = [ 
    'romano' => ['i','ii','iii','iv', 'v', 'vi','vii','viii','ix','x'], 
    'nombre'=> ['uno', 'dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez'],
    'ingles'=> ['one', 'two','three','four','five','six','seven','eight','nine','ten']
];

for($i=0; $i<$n; $i++){
    echo $datos[$texto][$i]." ";
}

