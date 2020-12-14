<?php
	function frame($controller, $ruta, $datos=[]) {
		if(session_status() == PHP_SESSION_NONE) {
    		session_start();
    	}

    	if(isset($_SESSION['_usuario'])) {
    		$datos['_header']['usuario'] = $_SESSION['_usuario'];
    	}

		$controller->load->view('_templates/head.php',$datos);
		$controller->load->view('_templates/header.php',$datos);
		$controller->load->view('_templates/nav.php',$datos);
		$controller->load->view($ruta,$datos);
		$controller->load->view('_templates/footer.php',$datos);
		$controller->load->view('_templates/end.php',$datos);
	}
?>