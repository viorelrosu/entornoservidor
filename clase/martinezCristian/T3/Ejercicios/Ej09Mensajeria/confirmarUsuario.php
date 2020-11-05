<?php
session_start();
$existe = false;

if (isset($_SESSION['usuarios'])) {
    $bd = $_SESSION['usuarios'];

    $nombre = isset($_GET['nombreN']) ? $_GET['nombreN'] : null;
    $pass = isset($_GET['passN']) ? $_GET['passN'] : null;

    foreach ($bd as $uno) {
        foreach ($uno as $k => $v) {
            if ($nombre == $k) {
                $existe = true;
                header('Location: existe.php');
                exit();
            }
        }
    }

    if ($existe == false && $nombre != null && $pass != null) {
        array_push($_SESSION['usuarios'], [
            $nombre => $pass
            //$nombre => ["pwd"=>$pass,"mensajes=>[0 =>["remitente"=>pepe,"fecha"=>28/10/2020,"texto"=>"sadasdsa"]]"];
        ]);
    }

    print_r($_SESSION['usuarios']);
} else {
    $nombre = isset($_GET['nombreN']) ? $_GET['nombreN'] : null;
    $pass = isset($_GET['passN']) ? $_GET['passN'] : null;

    if ($nombre != null && $pass != null) {
        $_SESSION['usuarios'] = array();
        array_push($_SESSION['usuarios'], [
            $nombre => $pass
            //$nombre => ["pwd"=>$pass,"mensajes"=>[0 =>["remitente"=>pepe,"fecha"=>28/10/2020,"texto"=>"sadasdsa"]]];
        ]);
    }

    print_r($_SESSION['usuarios']);
}

echo <<< HTML
<br>
<a href="registrar.php">Volver a registrar</a>
<br>
<a href="login.php">Volver a login</a>
HTML;

?>