<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	public function index()
	{
		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();
		$datos = [
			'paises' => $paises
		];
		frame($this,'pais/index',$datos);
	}


	public function create()
	{
		frame($this,'pais/create');
	}

	public function createPost()
	{

		// $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$nombre = $this->input->post('nombre');

		try {
			$this->load->model('pais_model');
			$this->pais_model->insert($nombre);
			$mensaje = 'El país <b>'.$nombre.'</b> ha sido dado de alta correctamente.';
			prg('success', $mensaje, 'pais/create');
		} catch(Exception $e) {
			prg('error',$e->getMessage(),'pais/create');
		}
	}

	public function update() {
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		try {
			$this->load->model('pais_model');
			$pais = $this->pais_model->getBeanById($id);
			$datos = [ 'pais'=>$pais ];
			frame($this,'pais/update',$datos);
		} catch(Exception $e) {
			prg('error', $e->getMessage(), 'pais/index');
		}
	}

	public function updatePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

		try {
			$this->load->model('pais_model');
			$this->pais_model->update($id, $nombre);
			$mensaje = 'El país <b>'.$nombre.'</b> ha sido modificado correctamente.';
			prg('success', $mensaje, 'pais/index');
		} catch(Exception $e) {
			prg('error', $e->getMessage(), 'pais/index');
		}

	}

	// public function delete()
	// {
	// 	$id = isset($_POST['id']) ? $_POST['id'] : null;

	// 	if( $id != null ) {
	// 		$this->load->model('pais_model');
	// 		$pais = $this->pais_model->getBeanById($id);
	// 		if($pais) {
	// 			$datos = [ 'pais'=>$pais ];
	// 			frame($this,'pais/delete',$datos);
	// 		} else {
	// 			$this->index();
	// 		}
	// 	} else {
	// 		$this->index();
	// 	}

	// }

	public function deletePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		try {
			$this->load->model('pais_model');
			$this->pais_model->deleteById($id);
			// $mensaje = 'El país ha sido eliminado correctamente.';
			// prg('success', $mensaje, 'pais/index');
			redirect(base_url().'pais/index');
		} catch(Exception $e) {
			prg('error', $e->getMessage(), 'pais/index');
		}

	}

}
