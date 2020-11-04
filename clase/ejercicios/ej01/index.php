<?php
session_start();

$mensaje = ['info','No te olvides de borrar Sesión y Cookies antes de empezar.'];

if ( isset($_GET['clear']) ) {
	if($_GET['clear'] == 'pendientes') {
		$mensaje = ['info','Se ha eliminado las palabras pendientes.'];
	}
}

if ( isset($_GET['add']) ) {
	if($_GET['add'] == 'pendientes') {
		$mensaje = ['success','Se ha añadido las palabras pendientes.'];
	}
}

require_once 'util.php';

echo <<<HTML
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 1</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
		<div class="container pt-4">
HTML;

echo getHtmlTitle('Lista de diccionario');

echo getHtmlAlert($mensaje[0],$mensaje[1]);

echo getHtmlDiccionario();

echo <<<HTML
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="row">
				<div class="col-md-6"><a href="add.php" class="btn btn-primary">Añadir palabras</a></div>
				<div class="col-md-6 text-right"><a href="traducir.php" class="btn btn-primary">Traducir</a></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlFooter('01');

echo <<<HTML
	</div>
</body>
HTML;

var_dump($_SESSION);

?>