<?php
include_once 'Ej09DatosYUtilidades/utilHTML.php';

for ($i = 1; $i <= 50; $i++) {
    if ($i%2==1){
        echo resaltar($i)."<br>";
    } else {
        echo $i."<br>";
    }
}

?>