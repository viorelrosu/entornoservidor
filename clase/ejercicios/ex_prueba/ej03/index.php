<?php
session_start();
require_once 'util.php';

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="scripts.js"></script>
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Exámen - Ejercicio 03');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
			<div class="form-row">
				<div class="form-group col-4">
					<button onclick="peticionAjax('peli')" class="btn btn-primary">Peli favorita</button>
				</div>
				<div class="form-group col">
					<input type="text" class="form-control" id="idPeli" name="peli" value="" readonly="readonly" />
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-4">
					<button onclick="peticionAjax('cancion')" class="btn btn-primary">Canción favorita</button>
				</div>
				<div class="form-group col">
					<input type="text" class="form-control" id="idCancion" name="cancion" value="" readonly="readonly" />
				</div>
			</div>
	</div>
</div>
HTML;


echo getHtmlFooter('03');

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>