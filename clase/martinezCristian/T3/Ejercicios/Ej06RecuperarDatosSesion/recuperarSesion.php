<?php
require_once 'Punto.php';
session_start();

echo "<h1>Datos recuperados</h1>";
echo "<b>Numero:</b> {$_SESSION['entero']} <br>";
echo "<b>Cadena:</b> {$_SESSION['real']} <br>";
echo "<b>Fecha: </b>";
print_r($_SESSION['fecha']);
echo "<br>";
echo "<b>Semaforo: </b>";
print_r($_SESSION['semaforo']);
echo "<br>";
echo "<b>Punto: </b>(". $_SESSION['punto']->getX().",".$_SESSION['punto']->getY().")<br>";

?>