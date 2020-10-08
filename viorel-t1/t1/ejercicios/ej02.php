<?php
$n=0;
echo "\nIntroduce numero de caracteres: ";
fscanf(STDIN, "%d\n", $n);
$c = ".";
for($i=$n; $i>0; $i--) {
    for($j=1; $j <= $i; $j++) {
        switch($c){
            case ".":
                $c="+";
                break;
            case "+":
                $c="-";
                break;
            case "-":
                $c=".";
                break;
        }
        echo $c;
    }
    echo "\n";
}
?>