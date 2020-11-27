<?php


class Ejercicio extends CI_Controller {

	function index(){
		//$this->load->view('hola/index.php');
		$this->ejercicio();
	}

	function ej03(){
		$this->load->helper('url');
		$this->load->model('ejercicio_model');
		$datos = $this->ejercicio_model->getLinks();
		$this->load->view('ej03/ejercicio',$datos);
	}
}

?>