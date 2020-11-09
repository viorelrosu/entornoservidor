<?php
echo "Introduce un número entre 1 y 6 ";
$num = readline();

if ($num > 0 && $num < 7) {
    for ($i = 1; $i <= $num; $i ++) {
        echo "<h$i>HOLA</h$i>\n";
    }
} else {
    echo "Número no válido";
}

?>