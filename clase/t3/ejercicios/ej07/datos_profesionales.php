<?php

session_start();

require_once('util.php');

if( isset($_GET['datos']) && $_GET['datos'] == 'personales' ) {
	$datos_personales = [
		'nombre' => isset($_GET['nombre']) ? $_GET['nombre'] : '',
		'apellidos' => isset($_GET['apellidos']) ? $_GET['apellidos'] : '',
		'fecha_nacimiento' => isset($_GET['fecha_nacimiento']) ? $_GET['fecha_nacimiento'] : '',
		'genero' => isset($_GET['genero']) ? $_GET['genero'] : '',
		'casado' => isset($_GET['casado']) ? $_GET['casado'] : '',
		'hijos' => isset($_GET['hijos']) ? $_GET['hijos'] : '',
		'nacionalidades' => isset($_GET['nacionalidades']) ? $_GET['nacionalidades'] : '',
	];

	$_SESSION['datos_personales'] = $datos_personales;
}

if( isset($_SESSION['datos_profesionales']) ) {
	$departamento = $_SESSION['datos_profesionales']['departamento'];
	$salario = $_SESSION['datos_profesionales']['salario'];
	$comentarios = $_SESSION['datos_profesionales']['comentarios'];
} else {
	$departamento = $salario = $comentarios = '';
}

echo pintarIconos(2);
$html = <<<HTML
<form action="datos_bancarios.php" method="get">
    <fieldset>
        <legend>Datos profesionales</legend>
        <input type="hidden" name="datos" value="profesionales" />
HTML;

$html .= pintarSelect('Departamento', 'departamento', ['Marketing'=>'Marketing','Ventas'=>'Ventas','Recursos Humanos'=>'Recursos Humanos','Gerencia'=>'Gerencia'], [], false);
$html .= <<<HTML
	    <div>
	        <field>
	        	<label>Salario</label><br />
	        	<input type="text" name="salario" value="$salario" />
	        </field>
	    </div>
	    <div>
	    	<field>
	    		<label>Comentarios</label><br />
	    		<textarea name="comentarios" id="comentarios" cols="30" rows="10">$comentarios</textarea>
	    	</field>
	    </div>
    </fieldset>
    <div>
	    <field><input type="submit" value="Grabar datos e ir al paso 3 - Datos bancarios"></field>
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

        