<?php
$badWords = ["jodidamente","puto"];

$cadena = "Eres tan jodidamente absurdo que voy a pasar de ti, puto php";
$cadenaCambiada = $cadena;

foreach ($badWords as $palabrota){
    $cadenaCambiada = str_replace($palabrota , "*****", $cadenaCambiada);
}
echo $cadena;
echo "\n";
echo $cadenaCambiada;

?>