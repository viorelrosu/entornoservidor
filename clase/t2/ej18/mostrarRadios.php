<?php
$numRadios = isset($_GET['numRadio']) ? $_GET['numRadio'] : false;

if ($numRadios) {
    $numeros = [
        1 => 'Uno',
        2 => 'Dos',
        3 => 'Tres',
        4 => 'Cuatro',
        5 => 'Cinco',
        6 => 'Seis',
        7 => 'Siete',
        8 => 'Ocho',
        9 => 'Nueve',
        10 => 'Diez',
        11 => 'Once',
        12 => 'Doce',
        13 => 'Trece',
        14 => 'Qatorce',
        15 => 'Quince'
    ];
    
        echo '<form action="resultado.php" method="get">';
        echo "<label>Selecciona una opción</label><br />";
        for ($i = 1; $i <= $numRadios; $i++) {
            echo <<<HTML
                <input type="radio" name="numSel" value="$i" /> $numeros[$i]<br />
            HTML;
        };
        
        echo '<br /><input type="submit" value="Enviar" />';
        echo '</form>';
}

?>