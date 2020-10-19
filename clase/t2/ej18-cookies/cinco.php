<?php

$numUno = isset($_COOKIE['n1']) ? $_COOKIE['n1']: false;
$numDos = isset($_GET['numDos']) ? $_GET['numDos'] : false;

if($numUno) {
    echo '<h1>Resultado final</h1>';
    echo '<h2>'.$numUno.' + '.$numDos.' = ' . ($numUno+$numDos).'<h2>';
    echo '<br />';
}
?>
