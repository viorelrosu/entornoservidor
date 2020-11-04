<?php
require_once 'util.php';
session_start();
$_SESSION['misCartas'] = [];
$_SESSION['baraja'] = inicializarBaraja();
$_SESSION['total'] = 0;
$_SESSION['ganoYo'] = 0;
$_SESSION['ganaBanca'] = 0;
$_SESSION['banca'] = [];

header('Location: jugar.php');

?>