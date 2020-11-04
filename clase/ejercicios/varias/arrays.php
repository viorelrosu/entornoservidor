<?php
array_push($array, $elem1 [,más elems] ); //Meter elementos en un array
in_array($elem, $array); //Verificar existencia de un valor
arrays_keys($array); //Obtener lista de claves

array_unshift($array, $elem1 [,más elems] ); //meter/colar elemento por delante
array_shift($array); //extraer el primer elemento del array
array_pop($array); //extraer el ultimo elemento del array y
//pops and returns the value of the last element of array, shortening the array by one element.

array_key_last ( $array ); //gets the last key of an array
array_key_first ( $array ); //gets the first key of an array

end ( $array ); //Returns the value of the last element or FALSE for empty array.
$fruits = array('apple', 'banana', 'cranberry');
echo end($fruits); // cranberry
?>