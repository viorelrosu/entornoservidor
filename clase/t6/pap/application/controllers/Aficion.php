<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aficion extends CI_Controller {

	function aficiones(){
		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();
		$data = [
			'view'=>'aficion/index',
			'aficiones' => $aficiones
		];

		$this->load->view('template',$data);
	}


	public function create()
	{
		$data = [
			'view'=>'aficion/create',
		];
		$this->load->view('aficion/create',$data);
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('aficion_model');
		if( $nombre != null and ($this->aficion_model->getBeanByNombre($nombre) == null ) ) {
			$this->aficion_model->insert($nombre);
			$this->load->view('aficion/create',$datos);
		}
		$this->load->view('aficion/error');
	}

	public function index()
	{
		$this->aficiones();
	}
}
