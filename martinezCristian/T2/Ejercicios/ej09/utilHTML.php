<?php
function resaltar($texto) {
	return "<h1>$texto</h1>";
}

/**
 *
 * @param string $nombre
 *        	El campo 'name'
 * @param array(string=>string) $etiquetas
 *        	name=>etiqueta de los radio button
 * @param string $seleccionado
 *        	name del radio pre-seleccionado
 */
function pintarRadio($nombre, $etiquetas, $seleccionado) {
	$texto = '';
	
	foreach ( $etiquetas as $k => $v ) {
		$texto .= ("<input type=\"radio\" name=\"$nombre\" id=\"$k\" value=\"$k\"" . ($k == $seleccionado ? ' checked="checked"' : '') . '>' . PHP_EOL);
		$texto .= ("<label for=\"$k\">$v</label><br/>" . PHP_EOL);
	}
	
	return $texto;
}


function pintarCheckboxes($nombre, $etiquetas, $seleccionados = []) {
	$texto = '';
	
	foreach ( $etiquetas as $k => $v ) {
		$texto .= ("<input type=\"checkbox\" name=\"$nombre" . '[]' . "\" id=\"$k\" value=\"$k\"" . (in_array ( $k, $seleccionados ) ? ' checked="checked"' : '') . '>' . PHP_EOL);
		$texto .= ("<label for=\"$k\">$v</label><br/>" . PHP_EOL);
	}
	return $texto;
}


function pintarSelect($nombre, $etiquetas, $seleccionados, $tipo) {
	$texto = '';
	$texto .= ('<label for="id' . $nombre . '">' . $nombre . '</label>' . PHP_EOL);
	$texto .= ('<select ' . ($tipo == 'multiple' ? 'multiple="multiple"' : '') . ' id="id' . $nombre . '" ' . 'name="' . $nombre . ($tipo == 'multiple' ? '[]' : '') . '">' . PHP_EOL);
	foreach ( $etiquetas as $k => $v ) {
		$texto .= ('<option ' . (in_array ( $k, $seleccionados ) ? 'selected="selected"' : '') . ' value="' . $k . '">' . $v . '</option>' . PHP_EOL);
	}
	$texto .= ('</select>' . PHP_EOL);
	
	return $texto;
}
?>