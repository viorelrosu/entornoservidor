<?php
require_once 'bd.php';


$comunidad = isset($_GET['comunidad']) ? $_GET['comunidad'] : false;

if($comunidad) {
	$htmlOpciones = '';
	foreach($bd[$comunidad] as $provincia) {
		$htmlOpciones .= '<option value="'.$provincia.'">'.$provincia.'</option>';
	}
	echo <<<HTML
		<select name="provincias" id="idProvincias" class="form-control">
			$htmlOpciones
		</select>
	HTML;
}



?>
