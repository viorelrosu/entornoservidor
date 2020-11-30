<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	function paises(){
		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();
		$datos = [
			'view'=>'pais/index',
			'paises' => $paises
		];

		$this->load->view('template',$datos);
	}


	public function create()
	{
		$datos = [ 'view'=>'pais/create' ];
		$this->load->view('template',$datos);
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('pais_model');
		if( $nombre != null and ($this->pais_model->getBeanByNombre($nombre) == null ) ) {
			$this->pais_model->insert($nombre);

			$datos = [ 'view'=>'pais/confirm', 'mensaje'=> 'El país <b>'.$nombre.'</b> ha sido dado de alta correctamente.' ];
			$this->load->view('template',$datos);
		} else {
			$datos = [ 'view'=>'pais/error', 'mensaje'=> 'Ha habido un error.' ];
			$this->load->view('template',$datos);
		}
	}

	public function delete()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('pais_model');
			$pais = $this->pais_model->getBeanById($id);
			if($pais) {
				$datos = [ 'view'=>'pais/delete', 'pais'=>$pais ];
				$this->load->view('template',$datos);
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
				$datos = [ 'view'=>'pais/confirm', 'pais'=>$pais, 'mensaje'=> 'El país <b>'.$pais->nombre.'</b> ha sido eliminado correctamente.' ];
				$this->load->view('template',$datos);
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
				$datos = [ 'view'=>'pais/update', 'pais'=>$pais ];
				$this->load->view('template',$datos);
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
			$datos = [ 'view'=>'pais/confirm', 'mensaje'=> 'El país <b>'.$nombre.'</b> ha sido modificado correctamente.' ];
			$this->load->view('template',$datos);
		} else {
			$this->index();
		}

	}

	public function index()
	{
		$this->paises();
	}
}
