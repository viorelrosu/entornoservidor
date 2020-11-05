<?php
$nombre = " ";
$edad = 0;
$cont1 = 0;
$aux = "";
$pers = [];
$nomPer = [];

while ($nombre != "fin") {

    echo "Introduce el nombre ";
    fscanf(STDIN, "%s\n", $nombre);

    if ($nombre != "fin") {
        echo "Introduce la edad de $nombre: ";
        fscanf(STDIN, "%d\n", $edad);

        //$nomPer[$cont1] = $nombre;       

        $pers[$nombre] = $edad;
        
      
        //$cont1 ++;

    }
}


// asort($pers); //ordenamos por el valor
ksort($pers); //ordenamos por la clave

foreach ($pers as $nombre => $edad){
    echo "$nombre($edad), ";

// for ($i = 0; $i < $cont1; $i++) {
//     $aux = $nomPer[$i];
// echo $nomPer[$i] . "($pers[$aux]), ";

}

?>