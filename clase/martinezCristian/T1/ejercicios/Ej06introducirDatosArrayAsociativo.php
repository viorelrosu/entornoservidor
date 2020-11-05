<?php
$arrPersonas = [];
$nombre = "";
$resultado = "";
do {
    echo "Introduce el nombre ";
    $nombre = readline();

    if ($nombre != "fin") {
        echo "Introduce la edad ";
        $edad = readline();
        
        $arrPersonas[$nombre]= $edad;
    }
} while ($nombre != "fin");



foreach ($arrPersonas as $nombre => $edad){

    $resultado .= next($arrPersonas) == true ?  "$nombre($edad), " :  "$nombre($edad) ";
    
    
}
echo $resultado;

?>