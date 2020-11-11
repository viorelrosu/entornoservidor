<?php
session_start();
require_once 'util.php';

if( !isset( $_SESSION['usuarios']) ) {
	$_SESSION['usuarios'] = [ 'Pepe' => [ 'tareas' => [] ], 'Ana' => [ 'tareas' => [] ], 'Juan' => [ 'tareas' => [] ] ];
}


echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Tareas empleados');

echo getHtmlAlert('info','No te olvides de borrar Sesión y Cookies');

echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="row">
				<div class="col-md-6"><a href="add.php" class="btn btn-primary">Añadir tarea</a></div>
				<div class="col-md-6 text-right"><a href="ver.php" class="btn btn-primary">Ver tareas</a></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;

//var_dump($_SESSION);

?>