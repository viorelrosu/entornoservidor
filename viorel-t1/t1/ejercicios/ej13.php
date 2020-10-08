<?php
$cadena = "Lorem no ipsum tonto sit amet, consectetur tonto elit. Aliquam ut fear lorem. Integer bomba ante lectus.";
$prohibidas = [ 'tonto', 'no', 'fear', 'bomba' ];
$a = explode(" ", $cadena);
$newCadena="";
foreach($a as $subcadena) {
    if(in_array($subcadena, $prohibidas)) {
        for($i=1; $i<=strlen($subcadena); $i++) {
            $newCadena .= "*";
        }
        $newCadena .= " ";
    } else {
        $newCadena .= $subcadena . " ";
    }
}

echo $newCadena;


echo "\nversion 2\n";
$cadena_censurada = $cadena;
foreach($prohibidas as $prohibido){
    $cadena_censurada = str_replace($prohibido, '*****', $cadena_censurada);
}
echo $cadena."\n";
echo $cadena_censurada;

