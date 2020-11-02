<?php
session_start();

$logout = ( isset($_REQUEST['logout'] ) ? $_REQUEST['logout'] : null );
if($logout) {
	// session_unset();
	$_SESSION['_session'] = false;
	header('Location: '.'index.php');
}

$usuarioRecordado = ( isset($_SESSION['_recordar']) && $_SESSION['_recordar'] ) ? $_SESSION['_activo'] : '';

$isSession = isset( $_SESSION['_session'] ) && $_SESSION['_session'] ? true : false;

require_once 'util.php';

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Sesión</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Iniciar sesión',true,false);

echo getHtmlAlert('info','Introduce tus datos de acceso');

echo <<<HTML

<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="bienvenido.php" method="get" >
			<div class="form-group">
				<label for="user">Introduce Usuario</label>
				<input type="text" class="form-control" id="user" name="user" value="$usuarioRecordado" />
			</div>
			<div class="form-group">
				<label for="pass">Introduce tu Contraseña</label>
				<input type="password" class="form-control" id="pass" name="pass" value="" />
			</div>
			<div class="form-group">
				<input type="checkbox" id="recordar" name="recordar" /> <label for="recordar">Recordar</label>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Iniciar sesión" class="btn btn-primary"/>
				</div>
				<!--
				<div class="form-group col-md-6 text-right">
					<a href="registrar.php" class="btn btn-info">Nuevo registro</a>
				</div>
				-->
			</div>
		</form>
	</div>
</div>
HTML;

echo getHtmlFooter('Iniciar Sesión');

echo <<<HTML
</div>
</body>
HTML;

var_dump($_SESSION);

?>