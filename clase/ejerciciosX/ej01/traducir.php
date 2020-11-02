<?php
session_start();
require_once 'util.php';

echo <<<HTML
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ejercicio 1 - Traducir palabra</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script type="text/javascript" src="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/form-serialize/serialize-0.2.min.js" ></script>
	</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Traducción de palabras');

echo getHtmlAlert('danger','Error','idAlert');
echo getHtmlAlert('success','Success','idSuccess');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="" method="" id="idForm">
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="palabra">Palabra</label>
				</div>
				<div class="form-group col-md-9">
					<input type="text" class="form-control" id="palabra" name="palabra" value="" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="traduccion">Traducción</label>
				</div>
				<div class="form-group col-md-9">
					<input type="text" class="form-control" id="traduccion" value="" readonly="readonly" />
				</div>
			</div>
		</form>
		<div class="form-row">
			<div class="form-group col-md-3">
				<button onclick="peticionAjax()" class="btn btn-primary"/>Traducir al ...</button>
			</div>
			<div class="form-group col-md-6">
				<select name="enIdioma" id="enIdioma" class="form-control" onchange="peticionAjax()">
					<option value="es">Español</option>
					<option value="en">Inglés</option>
					<option value="fr">Francés</option>
				</select>
			</div>
		</div>
	</div>
</div>
HTML;

echo <<<HTML
	<div class="row mt-3">
		<div class="col-md-6 offset-md-3">
			<hr/>
			<a href="index.php" class="btn btn-secondary">Volver</a>
		</div>
	</div>
HTML;

echo getHtmlFooter('01');

echo <<<HTML
</div>
<script type="text/javascript" src="scripts.js"></script>
</body>
HTML;

var_dump($_SESSION);

?>