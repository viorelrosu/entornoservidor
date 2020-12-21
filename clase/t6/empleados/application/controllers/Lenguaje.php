<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lenguaje extends CI_Controller {

	public function index()
	{
		$this->load->model('lenguaje_model');
		$lenguajes = $this->lenguaje_model->getAll();
		$datos = [
			'lenguajes' => $lenguajes
		];

		frame($this,'lenguaje/index',$datos);
	}


	public function create()
	{
		frame($this,'lenguaje/create');
	}

	public function createPost()
	{
		$nombre = $this->input->post('nombre');
		try {

			$this->load->model('lenguaje_model');
			$this->lenguaje_model->insert($nombre);
			$mensaje = 'El lenguaje <b>'. $nombre .'</b> ha sido creado correctamente.';
			prg('success',$mensaje,'lenguaje/index');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'lenguaje/create');

		}

	}

}
