<?php



if (isset($_GET['nombre'])) {
    session_start();
    if (isset($_SESSION['nombre'])) {
        echo "Hola {$_GET['nombre']}, te veo de nuevo por aquí";
    } else {
        echo "Hola {$_GET['nombre']}, la próxima vez me acordaré de ti";
        $_SESSION['nombre'] = $_GET['nombre'];
    }
} else {
    echo <<<FORM
    Dime tu nombre
    <form>
        <input type="text" name="nombre"/>
        <input type="submit">
    </form>
FORM;
}
?>