<?php
class Ejercicio_model extends CI_Model {
	function getLinks() {

		$datos['etiquetas'] = R::findAll('enlaces');

		//print_r($datos);

		return $datos;
	}
} 

?>