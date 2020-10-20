<?php
require_once('Punto.php');
session_start();
session_unset();

$_SESSION['entero'] = 5;
$_SESSION['real'] = 20.100;
$_SESSION['texto'] = 'Este es un string';
$_SESSION['fecha'] = date_create('2020-10-20');
$_SESSION['semaforo'] =  ['r'=>'rojo', 'a'=>'amarillo','v'=>'verde'];
$_SESSION['punto'] = new Punto(100,200);


echo <<<FORM
<form action="recuperarSession.php" method="get">
	<input type="submit">
</form>
FORM;

?>