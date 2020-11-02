<?php
session_start();
require_once 'util.php';

$logout = ( isset($_REQUEST['logout'] ) ? $_REQUEST['logout'] : null );

if($logout) {
	// session_unset();
	$_SESSION['_session'] = false;
	header('Location: '.'index.php');
}

$isSession = isset( $_SESSION['_session'] ) && $_SESSION['_session'] ? true : false;
if ( isset($_SESSION['_idioma']) ) {
	$idioma = $_SESSION['_idioma'];
} else {
	$idioma = $_SESSION['_idioma'] = 'ES';
}

//$usuarioRecordado = ( isset($_SESSION['_recordar']) && $_SESSION['_recordar'] ) ? $_SESSION['_activo'] : '';
$usuarioRecordado = ( isset($_SESSION['_activo']) ) ? $_SESSION['_activo'] : '';

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ej04 - Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		img { margin-right: 4px; }
		input { margin: 0px 8px 0 0;  }
		label { display: block; }
		#idRecordar { display: inline; }

	</style>
	<script type="text/javascript" src="scripts.js"></script>
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle($bdEtiquetas[$idioma]['title']);

echo getHtmlAlert('info',$bdEtiquetas[$idioma]['alert_inicio'], 'idMensajeInicio');

echo getHtmlRadioPaises($idioma);

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="juego.php" method="get" >
			<div class="form-group">
				<label for="user" id="idUser">{$bdEtiquetas[$idioma]['usuario']}</label>
				<input type="text" class="form-control" id="user" name="user" value="$usuarioRecordado" />
			</div>
			<div class="form-group">
				<label for="pass" id="idPass">{$bdEtiquetas[$idioma]['pass']}</label>
				<input type="text" class="form-control" id="pass" name="pass" value="" />
			</div>
			<div class="form-group">
				<input type="checkbox" id="recordar" name="recordar" /> <label for="recordar" id="idRecordar">{$bdEtiquetas[$idioma]['recordar']}</label>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" id="idBoton" value="{$bdEtiquetas[$idioma]['boton']}" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>
</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>