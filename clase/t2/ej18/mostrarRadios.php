<?php
require_once '../helpers/utilHTML.php';
$numRadios = isset($_GET['numRadios']) ? $_GET['numRadios'] : false;
$numUno = isset($_GET['numUno']) ? $_GET['numUno'] : false;

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
    if($numUno)  {
        echo '<form action="resultado.php" method="get">';
        echo '<input type="hidden" name="numUno" value="'.$numUno.'" />';
    } else {
        echo '<form action="ej18.php" method="get">';
    }
        echo "<h1>Selecciona una opción</h1>";
        $a = [];
        for ($i = 1; $i <= $numRadios; $i++) {
            $a[$i] = $e[$i];
        };
        echo pintarRadio('numSel', $a, 1);
        echo '<br /><input type="submit" value="Enviar" />';
        echo '</form>';
}

?>