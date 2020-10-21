<?php
session_start();
require_once('util.php');

if( isset($_SESSION['datos_personales']) ) {
	$nombre = $_SESSION['datos_personales']['nombre'];
	$apellidos = $_SESSION['datos_personales']['apellidos'];
	$fecha_nacimiento = $_SESSION['datos_personales']['fecha_nacimiento'];
	$genero = $_SESSION['datos_personales']['genero'];
	$casado = $_SESSION['datos_personales']['casado'];
	$hijos = $_SESSION['datos_personales']['hijos'];
	$nacionalidades = $_SESSION['datos_personales']['nacionalidades'];
} else {
	$nombre = $apellidos = $fecha_nacimiento = $genero = $casado = $hijos = $nacionalidades = '';
}

echo pintarIconos(1);

$html = '<form action="datos_profesionales.php" method="get">';
$html .= <<<HTML
    <fieldset>
        <legend>Datos personales</legend>
        <input type="hidden" name="datos" value="personales" />
        <div>
	        <field>
	        	<label>Nombre</label>
	        	<input type="text" name="nombre" value="$nombre" />
	        </field>
	        <field>
	        	<label>Apellidos</label>
	        	<input type="text" name="apellidos" value="$apellidos" />
	        </field>
	    </div>
	    <div>
	        <field>
	        	<label>Fecha de nacimiento</label>
	        	<input type="text" name="fecha_nacimiento" value="$fecha_nacimiento" />
	        </field>
	    </div>
HTML;
$html .= pintarRadio('Genero', 'genero', ['Mujer'=>'Mujer','Hombre'=>'Hombre','Otro'=>'Otro'], ($genero ? $genero : 'Hombre'));
$html .= pintarCheckboxes('casado', ['SI'=>'Casado o Pareja de Hecho'], $casado);
$html .= pintarCheckboxes('hijos', ['SI'=>'Hijos'], $hijos);
$html .= pintarSelect('Nacionalidades', 'nacionalidades', ['es'=>'Española','fr'=>'Francesa','it'=>'Italiana','pr'=>'Portuguesa'], (is_array($nacionalidades) ? $nacionalidades : []), true);

$html .= <<<HTML
    </fieldset>
    <div>
	    <field><input type="submit" value="Grabar datos e ir al paso 2 - Datos profesionales"></field>
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