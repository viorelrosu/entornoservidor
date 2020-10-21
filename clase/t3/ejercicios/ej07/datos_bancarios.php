<?php

session_start();

require_once('util.php');

if( isset($_GET['datos']) && $_GET['datos'] == 'profesionales' ) {
	$datos_profesionales = [
		'departamento' => isset($_GET['departamento']) ? $_GET['departamento'] : '',
		'salario' => isset($_GET['salario']) ? $_GET['salario'] : '',
		'comentarios' => isset($_GET['comentarios']) ? $_GET['comentarios'] : '',
	];

	$_SESSION['datos_profesionales'] = $datos_profesionales;
}

if( isset($_SESSION['datos_bancarios']) ) {
	$cuenta_bancaria = $_SESSION['datos_bancarios']['cuenta_bancaria'];
} else {
	$cuenta_bancaria = '';
}

echo pintarIconos(3);
$html = <<<HTML
<form action="datos_resumen.php" method="get">
    <fieldset>
        <legend>Datos bancarios</legend>
        <input type="hidden" name="datos" value="bancarios" />
        <div>
	        <field>
	        	<label for="cuenta_bancaria">Cuenta bancario</label><br />
	        	<input type="text" name="cuenta_bancaria" id="cuenta_bancaria" value="$cuenta_bancaria" />
	        </field>
	    </div>
    </fieldset>
    <div>
	    <field><input type="submit" value="Grabar datos e ir al paso final - Resumen"></field>
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