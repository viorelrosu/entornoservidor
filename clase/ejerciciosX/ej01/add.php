<?php
session_start();
require_once 'util.php';

echo <<<HTML
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 1 - Añadir nueva traducción</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Añadir nueva traducción');

//echo getHtmlAlert('info','No te olvides de borrar Sesión y Cookies antes de empezar');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="addPalabra.php" method="get" >
			<div class="form-group">
				<label for="palabraEs">Español</label><br />
				<input type="text" class="form-control" id="palabraEs" name="palabraEs" value="" />
			</div>
			<div class="form-group">
				<label for="palabraEn">Inglés</label><br/>
				<input type="text" class="form-control" id="palabraEn" name="palabraEn" value="" />
			</div>
			<div class="form-group">
				<label for="palabraFr">Francés</label><br/>
				<input type="text" class="form-control" id="palabraFr" name="palabraFr" value="" />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Enviar a Pendientes" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>
HTML;

echo <<<HTML
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<hr />
			<div class="row">
				<div class="col-md-6"><a href="addPendientes.php" class="btn btn-info">Pendientes -> diccionario</a></div>
				<div class="col-md-6 text-right"><a href="rmPendientes.php" class="btn btn-danger">Cancelar</a></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlDiccionario(true);

echo getHtmlFooter('01');

echo <<<HTML
</div>
</body>
HTML;

var_dump($_SESSION);

?>