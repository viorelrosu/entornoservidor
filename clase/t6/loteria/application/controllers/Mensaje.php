<?php 
class Mensaje extends CI_Controller {

	public function index(){
		if(session_status() == PHP_SESSION_NONE) {
    		session_start();
    	}

		$tipo = isset($_SESSION['_tipo']) ? $_SESSION['_tipo'] : 'success';
		$mensaje = isset($_SESSION['_mensaje']) ? $_SESSION['_mensaje'] : 'Pulsa el botón para volver';
		$link = isset($_SESSION['_link']) ? $_SESSION['_link'] : '';

		unset($_SESSION['_tipo']);
		unset($_SESSION['_mensaje']);
		unset($_SESSION['_link']);

		$datos['tipo'] = $tipo;
		$datos['mensaje'] = $mensaje;
		$datos['link'] = $link;
		frame($this,'_templates/mensaje', $datos);
	}


}

?>