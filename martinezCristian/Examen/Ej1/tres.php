<?php


$mes = isset($_GET['meses']) ? $_GET['meses'] : null;
$zodiaco = isset($_GET['zodiaco']) ? $_GET['zodiaco'] : null;

echo  "Signo escogido : $zodiaco <br> Mes escogido: $mes";