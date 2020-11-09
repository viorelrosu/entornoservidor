<?php
include 'Ej09DatosYUtilidades/utilHTML.php';

echo "<form>";
echo checkbox('deporte', [
    'F' => 'Futbol',
    'T' => 'Tenis',
    'V' => 'Vela'
], [
    'V',
    'F'
]);

echo "<input type=\"submit\" value=\"Validar\"></form>";


?>