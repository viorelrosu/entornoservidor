<?php 
require_once '../bd.php';

$idioma = isset($_GET['idioma']) ? $_GET['idioma'] : false;

echo implode('#',$BDetiquetas[$idioma]);

?>