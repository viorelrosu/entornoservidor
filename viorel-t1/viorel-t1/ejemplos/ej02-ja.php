<?php
echo "\nIntroduce n: ";
fscanf(STDIN, "%d\n", $i);
while ($i>0) {
    $n=$i;
    $s=0;
    while($n>0){
        switch($s){
            case 0:echo "+";break;
            case 1:echo "-";break;
            case 2:echo ".";break;
        }
        if($s<2){
            $s++;
        }else{
            $s=0;
        }
        $n--;
    }
    $i--;
    echo "\n";
}
?>