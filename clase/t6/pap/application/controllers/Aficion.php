<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aficion extends CI_Controller {

	function aficiones(){
		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAficiones();
		$datos = [];
		$datos['aficiones'] = $aficiones;

		$this->load->view('aficion/index',$datos);
	}


	public function create()
	{
		$datos = [];
		$this->load->view('aficion/create',$datos);
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('aficion_model');
		if( $nombre != null and ($this->aficion_model->getAficionByNombre($nombre) == null ) ) {
			$this->aficion_model->insertar($nombre);
			$this->load->view('aficion/create',$datos);
		}
		
		$this->load->view('aficion/error');
	}

	public function index()
	{
		$this->aficiones();
	}
}
