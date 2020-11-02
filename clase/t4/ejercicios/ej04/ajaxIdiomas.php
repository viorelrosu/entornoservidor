<?php
session_start();
require_once 'util.php';
$idiomaSeleccionado = isset( $_GET['id'] ) ? $_GET['id'] : false;
$_SESSION['_idioma'] = $idiomaSeleccionado;
echo implode('#', $bdEtiquetas[$idiomaSeleccionado]);

?>