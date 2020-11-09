<?php

function formulario(){
    $html = <<<HTML
    <fieldset>
    <legend>Formulario</legend>
    <form>
    <label for="nombre">Nombre</label> <Input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre"><br>
    <label for="pdw">Password</label> <Input type="password" name="pwd" id="pwd" placeholder="Introduce la contraseña"><br>
    <input type="submit" value="Enviar">
    </form>
    </fieldset>
HTML;
    echo $html;
}

$validacionN = true;
$validacionP = true;
$resultado = "";

if (isset($_GET['nombre']) && isset($_GET['pwd'])) {
    $nombre = ($_GET['nombre']);
    $pass = ($_GET['pwd']);
    
    if ($nombre == "") {
        $resultado .= "<font color=\"red\"> El nombre no puede quedar vacio </font><br>";
        $validacionN = false;
    }
    if (strlen($pass) < 6 || strlen($pass) > 8) {
        $resultado .= "<font color=\"red\"> la contraseña debe tener entre 6 y 12 caracteres </font><br>";
        $validacionP = false;
    }
    if ($validacionN == false || $validacionP == false) {   
        formulario();
        echo $resultado;
    } else {
        echo "Hola {$_GET['nombre']}, tu contraseña es {$_GET['pwd']}<br>";
    }
} else {
 formulario();
}

?>