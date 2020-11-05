<?php
$cadena = "123456789";

echo strlen($cadena).' devuelve la longitus de la cadena'; //
echo"\n";
echo substr($cadena, 3).'empieza la cadena desde la posicion 3 de la cadena'; 
echo"\n";
echo substr($cadena, 3,2).'empieza la cadena y la acaba en los numeros indicados (3+2)';
echo"\n";



$cadena2 = "uno-dos-tres";
$a = explode ('-',$cadena2); //hacemos un aray de una cadena designado que separa el array en este caso "-"

foreach ($a as $b){
    echo "$b ";
}
echo"\n";

echo mb_substr("uña",1,1);


?>