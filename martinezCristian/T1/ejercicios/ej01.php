<?php
$min = 0;
$max = 0;
$num = 0;

echo "Introduce un n�mero ";
fscanf(STDIN, "%d\n", $num);
$max = $num;
$min = $num;

while ($num != 0) {
    echo "Introduce un n�mero ";
    fscanf(STDIN, "%d\n", $num);
    
    
    if ($num != 0) {
        if ($num > $max) {
            $max = $num;
        } else if ($num < $min) {
            $min = $num;
        }
    }
}

echo "\nM�nimo : $min ";
echo "\nM�ximo : $max";

?>