<?php
$html = <<<HTML
    <form action="cookie2.php">
        Nombre:<input type="text" name="nombre" value =""/><br>
        Valor: <input type="text" name="valor" value =""/><br>
        Caducidad:<input type="text" name="caducidad" value =""/><br>
        <input type="submit">
    <form/>
HTML;
echo $html;
?>