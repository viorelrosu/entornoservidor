<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	function personas(){
		$this->load->model('persona_model');
		$personas = $this->persona_model->getAll();
		$datos = [
			'view'=>'persona/index',
			'personas' => $personas
		];

		$this->load->view('template',$datos);
	}


	public function create()
	{
		$datos = [];
		$this->load->view('persona/create',$datos);
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('persona_model');
		if( $nombre != null and ($this->persona_model->getBeanByNombre($nombre) == null ) ) {
			$this->persona_model->insert($nombre);
			$this->load->view('persona/create',$datos);
		}
		$this->load->view('persona/error');
	}

	public function index()
	{
		$this->personas();
	}
}
