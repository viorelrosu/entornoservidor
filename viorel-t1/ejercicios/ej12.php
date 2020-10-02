<?php
$cadena = "Lorem no ipsum tonto sit amet, consectetur tonto elit. Aliquam ut fear lorem. Integer bomb ante lectus.";
$a = explode(" ", $cadena);
$newCadena="";
foreach($a as $subcadena) {
    if($subcadena == 'tonto') {
        $newCadena .= "***** ";
    } else {
        $newCadena .= $subcadena . " ";
    }
    
}

echo $newCadena;



echo "\nversion 2 ==== \n";
echo implode('*****', explode('tonto', $cadena));

$num=0;
echo "\nversion 3 ==== \n";
echo str_replace('tonto','*****',$cadena, $num)."\n";
echo "He sustituido $num apariciones de la palabra 'tonto'";