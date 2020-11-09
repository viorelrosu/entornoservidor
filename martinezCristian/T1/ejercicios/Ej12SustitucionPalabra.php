<?php

//sustituimos la palabra tonto

$cadena = "No hay mas tonto que el que hace tonterias";

$arrAux = explode(" ", $cadena);

foreach ($arrAux as $palabra){
    if ($palabra == "tonto"){
        $palabra = "*****";
    }
    echo $palabra." ";
}

?>