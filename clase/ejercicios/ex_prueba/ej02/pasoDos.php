<?php
session_start();
require_once 'util.php';

$_SESSION['numUno'] = isset($_POST['numUno']) ? $_POST['numUno'] : '';

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

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="pasoTres.php" method="post" >
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="number" class="form-control" id="numDos" name="numDos" value="" placeholder="Introduce un número" />
				</div>
				<div class="form-group col-md-6">
					<input type="submit" value="Continuar" class="btn btn-primary"/>
				</div>
			</div>
		</form>
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