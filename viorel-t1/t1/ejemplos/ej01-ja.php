<?php
$max=0;
$min=0;
do{
    echo "\nIntroduce n: ";
    fscanf(STDIN, "%d\n", $i);
    if($i<$min){
        $min=$i;
    }
    if($i>$max){
        $max=$i;
    }
}while($i!=0);
echo "\nMaximo: $max";
echo "\nMinimo: $min";

?>