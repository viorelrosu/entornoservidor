<?php
session_start();
require_once 'util.php';

$cotaInf = isset($_GET['cotaInf']) ? $_GET['cotaInf'] : false;
$cotaSup = isset($_GET['cotaSup']) ? $_GET['cotaSup'] : false;

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

echo getHtmlTitle('Examen - Ejercicio 01');

echo getHtmlAlert('info','Selecciona un Signo del Zodiaco y un Mes del año');

$htmListaZodiaco = getHtmlLista('radio',getArrayZodiaco($cotaInf,$cotaSup),'signo',[$bdZodiaco[$cotaInf]]);
$htmlListaMeses = getHtmlLista('select',getArrayMeses($cotaInf,$cotaSup),'mes',[$bdMeses[$cotaInf]]);

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="pasoTres.php" method="get" >
			<div class="form-group">
				<label for="zodiaco" class=""><b>Signos del zodiaco</b></label><br />
				$htmListaZodiaco
			</div>
			<div class="form-group">
				<label for="meses"><b>Meses del año</b></label><br/>
				$htmlListaMeses
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Continuar" class="btn btn-primary"/>
				</div>
				<div class="form-group col-md-6 text-right">
					<a href="pasoUno.php" class="btn btn-secondary" >Volver</a>
				</div>
			</div>
		</form>
	</div>
</div>
HTML;

echo getHtmlFooter('01');

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>