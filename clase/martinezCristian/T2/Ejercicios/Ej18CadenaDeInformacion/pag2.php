<?php

$arrVal = ['uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve','diez','once','doce','trece','catorce','quince'];

echo "Elija una opción<br>";
echo "<form action=\"pag3.php\">";
for ($i = 0; $i < $_GET['valor'] ; $i++) {
    echo "<input type=\"radio\" value=".($i+1)." name=\"numero\"> ".$arrVal[$i]."<br>";
}
echo "<input type=\"submit\" value=\"Enviar\">";
echo "<form/><br>";
echo "<a href=\"index.php\"/>Volver<a>";

//echo "el valor introducido es: ". $_GET['valor'];
?>