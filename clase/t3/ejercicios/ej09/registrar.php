<?php
session_start();

require_once 'util.php';

$user = ( isset($_REQUEST['user']) ? $_REQUEST['user']: null );
$pass = ( isset($_REQUEST['pass'] ) ? $_REQUEST['pass'] : null );

$primeraVez = ($user==null && $pass==null);

if( !$primeraVez ) {
	$_SESSION['usuarios'][$user] = [
		'pwd' => $pass,
		'mensajes' => []
	];

	header('Location: '.'login.php?tipo=registro&user='.$user);
}

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Nuevo registro');

echo <<<HTML
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form action="" method="post" >
			<div class="form-group">
				<label for="user">Introduce Usuario</label><br />
				<input type="text" class="form-control" id="user" name="user" value="" />
			</div>
			<div class="form-group">
				<label for="name">Introduce tu Contraseña</label><br/>
				<input type="text" class="form-control" id="name" name="pass" value="" />
			</div>
			<div class="form-group">
				<input type="submit" value="Registro" class="btn btn-primary"/>
				<input type="button" value="Cancelar" class="btn btn-default" onClick="location.href='login.php'" />
			</div>
		</form>
	</div>
</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;

//var_dump($_SESSION);

?>
