<?php
$num = 0;
$char = ".";

echo "Introduce un número ";
fscanf(STDIN, "%d\n", $num);

for ($y = $num; $y >= 1; $y --) {

    for ($x = 0; $x < $y; $x ++) {

        switch ($char) {
            case ".":
                $char = "+";
                break;
            case "+":
                $char = "-";
                break;
            case "-":
                $char = ".";
                break;
        }
        echo $char;
    }
    echo "\n";
}

?>