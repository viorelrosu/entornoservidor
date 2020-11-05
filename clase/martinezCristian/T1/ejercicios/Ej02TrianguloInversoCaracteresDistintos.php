<?php

$char = ".";

echo "Introduce un número: ";
$num = readline();

for ($i = $num; $i > 0; $i --) {
    for ($j = 0; $j < $i; $j ++) {

        switch ($char) {
            case ".":
                $char = "+";break;
            case "+":
                $char = "-";break;
            case "-":
                $char = ".";break;
        }
        echo $char;
    }
    echo "\n";
}

?>