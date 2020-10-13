<?php
do{
    echo "\nIntroduce n (n>0): ";
    fscanf(STDIN, "%d\n", $n);
}while($n<=0);

do{
    echo "\nIntroduce p (entre 1 y 10): ";
    fscanf(STDIN, "%d\n", $p);
}while($p<1||$p>10);

while($n>0){
    $i=$p;
    $s=0;
    while($i>0){
        echo $s;
        $i--;
        $s++;
    }
    $n--;
}
?>