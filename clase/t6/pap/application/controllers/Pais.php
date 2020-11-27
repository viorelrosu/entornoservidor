<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	function paises(){
		$this->load->model('pais_model');
		$paises = $this->pais_model->getPaises();
		$datos = [];
		$datos['paises'] = $paises;

		$this->load->view('pais/index',$datos);
	}


	public function create()
	{
		$datos = [];
		$this->load->view('pais/create',$datos);
	}

	public function createPost()
	{
		$nombrePais = isset($_POST['nombreP']) ? $_POST['nombreP'] : null;
		$this->load->model('pais');
		$this->pais->insertarPais($nombrePais);
		$this->load->view('pais/create',$datos);
	}

	public function index()
	{
		$this->paises();
	}
}
