<?php

session_start();

require_once('util.php');

if( isset($_GET['datos']) && $_GET['datos'] == 'bancarios' ) {
	$datos_bancarios = [
		'cuenta_bancaria' => isset($_GET['cuenta_bancaria']) ? $_GET['cuenta_bancaria'] : '',
	];

	$_SESSION['datos_bancarios'] = $datos_bancarios;
}

if( isset($_SESSION['datos_personales']) ) {
	$nombre = $_SESSION['datos_personales']['nombre'];
	$apellidos = $_SESSION['datos_personales']['apellidos'];
	$fecha_nacimiento = $_SESSION['datos_personales']['fecha_nacimiento'];
	$genero = $_SESSION['datos_personales']['genero'];
	$casado = $_SESSION['datos_personales']['casado'];
	$hijos = $_SESSION['datos_personales']['hijos'];
	$nacionalidades = getNacionalidadesString($_SESSION['datos_personales']['nacionalidades']);
} else {
	$nombre = $apellidos = $fecha_nacimiento = $genero = $casado = $hijos = $nacionalidades = '';
}

if( isset($_SESSION['datos_profesionales']) ) {
	$departamento = $_SESSION['datos_profesionales']['departamento'];
	$salario = $_SESSION['datos_profesionales']['salario'];
	$comentarios = $_SESSION['datos_profesionales']['comentarios'];
} else {
	$departamento = $salario = $comentarios = '';
}

if( isset($_SESSION['datos_bancarios']) ) {
	$cuenta_bancaria = $_SESSION['datos_bancarios']['cuenta_bancaria'];
} else {
	$cuenta_bancaria = '';
}

echo pintarIconos(4);

$html = <<<HTML
<form action="datos_resumen.php" method="get">
    <fieldset>
        <legend>Datos personales</legend>
        <div>
	        Nombre: <b>$nombre</b><br />
	        Apellidos: <b>$apellidos</b><br />
	        Fecha de nacimiento: <b>$fecha_nacimiento</b><br />
	        Genero: <b>$genero</b><br />
	        Casado: <b>$casado</b><br />
	        Hijos: <b>$hijos</b><br />
	        Nacionalidades: <b>$nacionalidades</b><br />
	    </div>
    </fieldset>
    <fieldset>
        <legend>Datos profesionales</legend>
        <div>
	        Departamento: <b>$departamento</b><br />
	        Salario: <b>$salario</b><br />
	        Comentarios: <b>$comentarios</b><br />
	    </div>
    </fieldset>
    <fieldset>
        <legend>Datos bancarios</legend>
        <div>
	        Cuenta corriente: <b>$cuenta_bancaria</b>
	    </div>
    </fieldset>
    <div>
	    <a href="datos_personales.php">Volver al principio</a>
	</div>
</form>
HTML;

echo $html;
?>

<style>
	div {
		margin-top: 10px;
	}
</style>

