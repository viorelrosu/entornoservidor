<?php
	function frame($controller, $ruta, $datos=null) {
		$controller->load->view('_templates/head.php');
		$controller->load->view('_templates/nav.php');
		$controller->load->view('_templates/header.php');
		$controller->load->view($ruta,$datos);
		$controller->load->view('_templates/footer.php');
		$controller->load->view('_templates/end.php');
	}

?>