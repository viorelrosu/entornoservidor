<?php
session_start();
require_once 'util.php';

$numDos = isset($_POST['numDos']) ? $_POST['numDos'] : false;

if($numDos and isset($_SESSION['numUno'])) {
	$numUno = $_SESSION['numUno'];
	if($numUno < $numDos) {
		$mensaje = 'El primer número es MENOR que el segundo número';
	} elseif ($numUno > $numDos) {
		$mensaje = 'El primer número es MAYOR que el segundo número';
	} elseif ($numUno == $numDos) {
		$mensaje = 'El primer número es IGUAL que el segundo número';
	}
}


echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Examen - Ejercicio 02');

echo getHtmlAlert('success','Gracias');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
Primer número: $numUno<br />
Segundo número: $numDos<br />
$mensaje<br />
<hr />
<a href="pasoUno.php" class="btn btn-secondary">Volver</a>
</div>
</div>
HTML;


echo getHtmlFooter('02');

echo <<<HTML
</div>
</body>
HTML;

var_dump($_SESSION);

?>