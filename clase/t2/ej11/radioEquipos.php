<?php 
require_once('../helpers/utilHTML.php');

$array=[
    'R' => 'Real Madrid',
    'B' => 'Barcelona',
    'AT' => 'Atletico de Madrid',
];

echo pintarRadio('equipo', $array, 'B');
?>