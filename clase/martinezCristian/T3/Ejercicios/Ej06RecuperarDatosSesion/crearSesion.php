<?php
require_once 'Punto.php';
session_unset();
session_start();

$entero = 25;
$texto = "Como me molan las sesiones";
$fecha = date_create('2020-10-31');
$semaforo = ["r"=>"rojo","a"=>"amarillo","v"=>"verde"];
$punto = new Punto(50,50);

$_SESSION['entero'] = $entero;
$_SESSION['real'] = $texto;
$_SESSION['fecha'] =  $fecha;//$fecha.mktime(0,0,0,10,31,2020);
$_SESSION['semaforo'] = $semaforo;
$_SESSION['punto'] = $punto;

$html = <<<HTML
<form action="recuperarSesion.php">
    <input type="submit" value="Recuperar"/>
</form>
HTML;
echo $html;
?>