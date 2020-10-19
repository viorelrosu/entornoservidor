<?php
require_once '../helpers/utilHTML.php';
$numRadios = isset($_GET['numRadios']) ? $_GET['numRadios'] : false;

if ($numRadios) {
    $e = [
        'Cero',
        'Uno',
        'Dos',
        'Tres',
        'Cuatro',
        'Cinco',
        'Seis',
        'Siete',
        'Ocho',
        'Nueve',
        'Diez',
        'Once',
        'Doce',
        'Trece',
        'Catorce',
        'Quince'
    ];
    echo '<form action="cinco.php" method="get">';
    echo "<h1>Selecciona una opción</h1>";
    $a = [];
    for ($i = 1; $i <= $numRadios; $i++) {
        $a[$i] = $e[$i];
    };
    echo pintarRadio('numDos', $a, 1);
    echo '<br /><input type="submit" value="Enviar" />';
    echo '</form>';
}

?>
