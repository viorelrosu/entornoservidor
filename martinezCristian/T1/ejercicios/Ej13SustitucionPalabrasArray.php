<?php
$arrPalabrasProhib = ["sexo","Dios","matrimonio"];

$cadena = "Dios te dice que no debes tener sexo antes del matrimonio";
$auxCadena = $cadena;

// $arrAuxCadena = explode(" ", $auxCadena);

// foreach ($arrAuxCadena as $palabra){
//     foreach ($arrPalabrasProhib as $prohibido){
//         if ($palabra == $prohibido){
//             $palabra = "*****";
//         }
//     }
    
//     echo $palabra." ";
// }

foreach ($arrPalabrasProhib as $prohibida){
    $auxCadena = str_replace($prohibida, "*****", $auxCadena);
}
echo $auxCadena;