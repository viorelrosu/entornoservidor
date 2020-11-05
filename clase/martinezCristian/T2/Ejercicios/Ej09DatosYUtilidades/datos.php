<?php

$html = <<<HTML
    <form action="utilHTML.php">
        <label for="datos">Datos:</label> <input type="text" name="dat" id="datos"/><br>
        <input type="submit" value="Validar"/>
    </form>
HTML;

echo $html;
?>