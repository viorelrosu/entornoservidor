<?php
session_start();
require_once 'util.php';

$idioma = isset( $_SESSION['_idioma'] ) ? $_SESSION['_idioma'] : 'ES';

$user = ( isset($_REQUEST['user']) ? $_REQUEST['user']: null );
$pass = ( isset($_REQUEST['pass'] ) ? $_REQUEST['pass'] : null );

$sinLogin = ($user==null && $pass==null);
$isSession = isset( $_SESSION['_session'] ) ?  $_SESSION['_session'] : false;

$credencialesCorrectas = isset ( $bdUsuarios[$user] ) && $bdUsuarios[$user] == $pass;

if( $sinLogin && !$isSession) {
	header('Location: '.'index.php');
} else {

	$html = <<<HTML
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<form action="" method="get">

					<label for="num" class="inline">{$bdEtiquetas[$idioma]['numero']}</label>
					<input type="number" name="num" id="num" value="" min="1" max="10" /><br/>
					<input type="submit" class="btn btn-primary" value="Play" />
				</form>
			</div>
		</div>
	HTML;

	$num = ( isset($_REQUEST['num'] ) ? $_REQUEST['num'] : null );
	if($num) {
		//vamos a jugar
		$numRand = rand(1,10);
		if( $num == $numRand ) {
			#has acertado
			$respuesta = getHtmlAlert('success',$bdEtiquetas[$idioma]['alert_acierto'],'idAcierto');
		} elseif ($num < $numRand) {
			# te has quedado corto
			$respuesta = getHtmlAlert('danger',$bdEtiquetas[$idioma]['alert_corto'],'idCorto');
		} elseif ($num > $numRand) {
			# te has pasado
			$respuesta = getHtmlAlert('danger',$bdEtiquetas[$idioma]['alert_pasado'],'idPasado');
		}

		$html .= <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<span id="idMyNumber" data-num="$numRand">{$bdEtiquetas[$idioma]['my_number']} $numRand</span><br />
					<span id="idYourNumber" data-num="$num">{$bdEtiquetas[$idioma]['your_number']} $num</span><br />
				</div>
			</div>
		HTML;

		$html .= "<br />" . $respuesta;

	}

	$html .= getHtmlBoton('salir','index.php?logout=true','btn btn-info','idSalir');

	if ( $isSession ) {
		$mensaje = ['info', $bdEtiquetas[$_SESSION['_idioma']]['bienvenido'],'idBienvenida' ];
	} else {

		if ($credencialesCorrectas) {
			//sesion valida
			$mensaje = ['info', $bdEtiquetas[$_SESSION['_idioma']]['bienvenido'] . ( $user ? $user : $_SESSION['_activo']),'idBienvenida' ];
			$_SESSION['_activo'] = $user;
			$_SESSION['_recordar'] = ( isset($_REQUEST['recordar'] ) ? true : false );
			$_SESSION['_session'] = true;

		} else {
			//sesión invalida
			$mensaje = ['danger', $bdEtiquetas[$_SESSION['_idioma']]['invalid'],'idError'];
			//header('Refresh: 3; URL=index.php');

			$html = getHtmlBoton('volver','index.php','btn btn-secondary','idVolver');
		}
	}
}

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
		label.inline { display: inline-block!important; }
	</style>
	<script type="text/javascript" src="scripts.js"></script>
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle($bdEtiquetas[$_SESSION['_idioma']]['title']);

echo getHtmlAlert($mensaje[0],$mensaje[1], $mensaje[2]);

echo getHtmlRadioPaises($idioma);

echo $html;

echo getHtmlFooter();

//var_dump($_SESSION);

?>