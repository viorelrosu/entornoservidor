<?php
$n=0; $s=0;
echo "Introduce n: ";
fscanf ( STDIN, "%d\n", $n );
$a=[];

while ( $n != 0 ) {
    
    echo "Introduce n: ";
    fscanf ( STDIN, "%d\n", $n );
    
    if($n!=0){
        array_push($a, $n);
    }
}

echo "Introduce operación: Sumar/Multiplicar ";
fscanf ( STDIN, "%s\n", $s );

switch($s){
    case "sumar":
        mostrarOperacion( $a, 1 );
        break;
    case "multiplicar":
        mostrarOperacion( $a, 2 );
        break;
}

function mostrarOperacion($array, $operacion) {
    $res = 0;
    $numeros = '';
    
    if($operacion == 1) {
        foreach($array as $key=>$v) {
            $res += $v;
            if($key == array_key_last($array)){
                $numeros .= "($v)";
            } else {
                $numeros .= "($v)+";
            }
            
        };
        echo "La suma de los números $numeros es: " . $res;
    } else {
        foreach($array as $key=>$v) {
            $res *= $v;
            if($key == array_key_last($array)){
                $numeros .= "($v)";
            } else {
                $numeros .= "($v) X ";
            }
        };
        echo "La multiplicación de los números $numeros es: " . $res;
    }
   
}

?>