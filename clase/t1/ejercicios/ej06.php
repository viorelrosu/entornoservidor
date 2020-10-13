<?php
$nombres = [];

$nombre='';
$edad=0;

while($nombre!='fin'){
    echo "Introduce nombre: ";
    fscanf ( STDIN, "%s\n", $nombre );
    
    if($nombre !='fin') {
        echo "Introduce edad: ";
        fscanf ( STDIN, "%d\n", $edad );
    
        $nombres[$nombre] = $edad;
    }
}

//arsort($nombres);
//asort($nombres); - ordena por valor
ksort($nombres); //ordena por clave

foreach($nombres as $key=>$item) {
    echo "$key($item)";
    if($key != array_key_last($nombres)) {
        echo ", ";
    }
}
