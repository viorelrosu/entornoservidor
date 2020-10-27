<?php
session_start();
require_once 'util.php';

$tarea = isset($_REQUEST['tarea']) ? $_REQUEST['tarea'] : false;
$empleado = isset($_REQUEST['empleado']) ? $_REQUEST['empleado'] : false;
$mensajeHtml = '';
if( $tarea && $empleado ) {
	if ( !isset($_SESSION['usuarios'][$empleado]['tareas']) ) {
		$_SESSION['usuarios'][$empleado]['tareas'] = [];
	}

	$_SESSION['usuarios'][$empleado]['tareas'][] = $tarea;
	$mensajeHtml = getHtmlAlert('success', 'La tarea se ha guardado correctamente!');
}

$htmlTareas = getHtmlTareas($empleado, true);

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Nueva Tarea');

echo $mensajeHtml;

echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			$htmlTareas
		</div>
	</div>
HTML;

echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<a href="index.php" class="btn btn-secondary">Volver</a>
		</div>
	</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;

?>