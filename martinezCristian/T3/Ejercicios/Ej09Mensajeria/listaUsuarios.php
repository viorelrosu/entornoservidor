<?php
session_start();

$correcto = false;
//$oculto = "";

if (isset($_GET['enviarLista'])) {
    
    $_SESSION['activo'] = isset($_GET['nombre']) ? $_GET['nombre'] : null;

    if (isset($_SESSION['usuarios'])) {
        $id = isset($_GET['nombre']) ? $_GET['nombre'] : null;
        $pass = isset($_GET['pass']) ? $_GET['pass'] : null;

        $bd = $_SESSION['usuarios'];

        foreach ($bd as $uno) {
            foreach ($uno as $k => $v) {
                if ($id == $k && $pass == $v) {
                    $correcto = true;
                }
            }
        }
    }
    if ($correcto == false) {

        echo <<< HTML
    <h2>usuario y pass incorrecto</h2>
    <br>
    <a href="login.php">Volver a login</a>
HTML;
        //sleep(3);

    } else { // recorremos la array de usuarios para ver a quienes podemos enviar mensajes
        if (isset($_SESSION['usuarios'])) {
            echo "Usuario actual {$_SESSION['activo']}";
            echo "<h2>Lista de usuarios / mensajes </h2>";
            $bd = $_SESSION['usuarios'];
            foreach ($bd as $uno) {
                foreach ($uno as $k => $v) {
                    if ($k != $_SESSION['activo']) {
                        echo $k . "&nbsp;&nbsp;&nbsp;<a href=\"escribir.php\">Escribir</a><br>";
                    }
                }
            }
        }
        echo "<br><a href=\"login.php\">Volver a Login</a>";
    }
} else {

    echo "Usuario actual {$_SESSION['activo']}";
    echo "<h2>Lista de usuarios / mensajes </h2>";
    $bd = $_SESSION['usuarios'];
    foreach ($bd as $uno) {
        foreach ($uno as $k => $v) {
            if ($k != $_SESSION['activo']) {
                echo $k . "&nbsp;&nbsp;&nbsp;<a href=\"escribir.php\">Escribir</a><br>";
            }
        }
    }

    echo "<br><a href=\"login.php\">Volver a Login</a>";
}
?>