<?php
session_start();
require_once 'util.php';

if ( !isset($_SESSION['pendientes']) ) {
	$_SESSION['pendientes'] = [];
}

$palabraEs = isset($_REQUEST['palabraEs']) ? $_REQUEST['palabraEs'] : false;
$palabraEn = isset($_REQUEST['palabraEn']) ? $_REQUEST['palabraEn'] : false;
$palabraFr = isset($_REQUEST['palabraFr']) ? $_REQUEST['palabraFr'] : false;

if( $palabraEs and $palabraEn and $palabraFr){
	$_SESSION['pendientes'][] = [
		'es'=> $palabraEs,
		'en' => $palabraEn,
		'fr' => $palabraFr
	];
	$alert = ['success','La palabra se ha añadido correctamente.'];
	header('Refresh: 3; URL=add.php');
} else {
	$alert = ['danger','No puede haber campos vacios. Vuelve a rellenar el formulario.'];
}

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

echo getHtmlAlert($alert[0],$alert[1]);

echo <<<HTML
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="row">
				<div class="col-md-6"><a href="add.php" class="btn btn-secondary">Volver</a></div>
			</div>
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