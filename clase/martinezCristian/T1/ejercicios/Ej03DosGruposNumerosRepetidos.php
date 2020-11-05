<?php

echo "Introduce un número para que haga la cadena de 0-n";
$num1 = readline();

echo "Introduce un número para que se repita la cadena anterior";
$num2 = readline();

for ($i = 0; $i < $num2; $i++) {
    for ($j = 0; $j < $num1; $j++) {
        echo $j." ";
    }
}

