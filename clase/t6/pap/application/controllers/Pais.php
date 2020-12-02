<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	public function index()
	{
		$this->paises();
	}

	function paises(){
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
		$datos = [];
		$this->load->model('pais_model');
		if( $nombre != null and ($this->pais_model->getBeanByNombre($nombre) == null ) ) {
			$this->pais_model->insert($nombre);

			$mensaje = 'El país <b>'.$nombre.'</b> ha sido dado de alta correctamente.';
			$this->success($mensaje);
			//frame($this,'pais/confirm',$datos);
		} else {
			$datos['form'] = [ 'nombre'=>$nombre ];
			$datos['mensaje'] = 'Ha habido un error.';
			frame($this,'pais/error',$datos);
		}
	}

	public function delete()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('pais_model');
			$pais = $this->pais_model->getBeanById($id);
			if($pais) {
				$datos = [ 'pais'=>$pais ];
				frame($this,'pais/delete',$datos);
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}

	}

	public function deletePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('pais_model');
			$pais = $this->pais_model->getBeanById($id);
			if($pais) {
				$this->pais_model->delete($pais);
				$datos = [ 'pais'=>$pais, 'mensaje'=> 'El país <b>'.$pais->nombre.'</b> ha sido eliminado correctamente.' ];
				frame($this,'pais/confirm',$datos);
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}

	}

	public function update() {
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		if($id != null) {
			$this->load->model('pais_model');
			$pais = $this->pais_model->getBeanById($id);
			if($pais) {
				$datos = [ 'pais'=>$pais ];
				frame($this,'pais/update',$datos);
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}
	}

	public function updatePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('pais_model');

		if( $id != null and $nombre != null and ($this->pais_model->getBeanByNombre($nombre) == null ) ) {
			$this->pais_model->update($id, $nombre);
			$datos = [ 'mensaje'=> 'El país <b>'.$nombre.'</b> ha sido modificado correctamente.' ];
			frame($this,'pais/confirm',$datos);
		} else {
			$this->index();
		}

	}

	public function success($mensaje)
	{
		$datos  = array( 'mensaje' => $mensaje);
		frame($this,'pais/success',$datos);
	}
}
