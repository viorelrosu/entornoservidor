<?php
$bd1 = [100,200];
$bd2 = [100,200];

function conReferencia(&$bd){
    $bd[0] = 'kk';
}

function conGlobal(){
    global $bd2;
    $bd2[0] = 'kk2';
}

conReferencia($bd1);
conGlobal();

print_r($bd1);
print_r($bd2);