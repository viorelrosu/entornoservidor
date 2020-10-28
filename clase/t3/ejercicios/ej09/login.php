<?php
session_start();

require_once 'util.php';

$user = ( isset($_REQUEST['user']) ? $_REQUEST['user'] : null );
$pass = ( isset($_REQUEST['pass'] ) ? $_REQUEST['pass'] : null );
$tipo = ( isset($_REQUEST['tipo'] ) ? $_REQUEST['tipo'] : null );

if ( $tipo == 'cerrar' ) {
	// session_unset();
	$_SESSION['_session'] = false;
	header('Location: '.'login.php');
}

$primeraVez = ($user==null && $pass==null);

if( $primeraVez ) {
	//comprobar los datos
	$mensaje = ['info','Introduce tus datos e inicia sesión'];
} else {

	if ( $tipo == 'registro' and in_array($user, array_keys($_SESSION['usuarios']) ) ) {
		$mensaje = ['success', 'Gracias por registrarte $user! Ya puedes iniciar sessión con tus datos!'];
	}
}

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Iniciar sesión');

echo <<<HTML
<div class="row">
	<div class="col-md-4 offset-md-4">
		<div class="alert alert-$mensaje[0]" role="alert">
	  		$mensaje[1]
		</div>
	</div>
</div>
HTML;

$recordarUser = ( isset($_SESSION['_recordar']) && $_SESSION['_recordar'] ) ? $_SESSION['_activo'] : '';

echo <<<HTML
<div class="row">
	<div class="col-md-4 offset-md-4">
		<form action="listaUsuarios.php" method="get" >
			<div class="form-group">
				<label for="user">Introduce Usuario</label><br />
				<input type="text" class="form-control" id="user" name="user" value="$recordarUser" />
			</div>
			<div class="form-group">
				<label for="name">Introduce tu Contraseña</label><br/>
				<input type="text" class="form-control" id="name" name="pass" value="" />
			</div>
			<div class="form-group">
				<input type="checkbox" id="recordar" name="recordar" /> <label for="recordar">Recordar</label>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Iniciar sesión" class="btn btn-primary"/>
				</div>
				<div class="form-group col-md-6 text-right">
					<a href="registrar.php" class="btn btn-info">Nuevo registro</a>
				</div>
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
