<?php
$n = 0;
$c = '.';

echo "Introduce n: ";
fscanf(STDIN, "%d\n", $n);

for ($y = $n; $y >= 1; $y --) {
    for ($x = 0; $x < $y; $x ++) {

       // echo $c;
                switch ($c) {
                    case '.':  $c='+';break;
                    case '+':  $c='-';break;
                    case '-':  $c='.';break;
                }
                echo $c;
    }
    echo "\n";
}

?>