<?php
echo "Introduce un número (el 0 es para parar el programa)";
$opcion = readline();
$min = $opcion;
$max = $opcion;
do {
    echo "Introduce un número (el 0 es para parar el programa)";
    $opcion = readline();
    if ($opcion != 0) {
        if ($opcion > $max) {
            $max = $opcion;
        } else if ($opcion < $min) {
            $min = $opcion;
        }
    }
} while ($opcion != 0);

echo "El mayor es : $max\nEl menor es: $min";
?>

