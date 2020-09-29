<?php 
$n=0;
echo "\nIntroduce n: ";
fscanf(STDIN, "%d\n", $n);

echo "\nIntroduce p: ";
fscanf(STDIN, "%d\n", $p);

for($i=0; $i<=$n; $i++) {
    for($j=0; $j<$p; $j++) {
        echo $j;
        if($j==$p-1) {
            echo " ";
        }
    }
}
?>