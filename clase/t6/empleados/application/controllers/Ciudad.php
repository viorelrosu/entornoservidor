<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

	public function index()
	{
		$this->load->model('ciudad_model');
		$ciudades = $this->ciudad_model->getAll();
		$datos = [
			'ciudades' => $ciudades
		];

		frame($this,'ciudad/index',$datos);
	}


	public function create()
	{
		frame($this,'ciudad/create');
	}

	public function createPost()
	{
		$nombre = $this->input->post('nombre');
		try {

			$this->load->model('ciudad_model');
			$this->ciudad_model->insert($nombre);
			$mensaje = 'La ciudad <b>'. $nombre .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'ciudad/index');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'ciudad/create');

		}

	}

}
