<?php
include 'Ej09DatosYUtilidades/utilHTML.php';
$edades = [
    "Cristian" => 30,
    "Raquel" => 39,
    "Emilio" => 30
];
echo "<form>";
echo radio("edades", $edades ,"Raquel");
echo "<input type=\"submit\"/> </form>";

?>