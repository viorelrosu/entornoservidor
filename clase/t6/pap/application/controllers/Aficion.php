<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aficion extends CI_Controller {

	public function index()
	{
		$this->aficiones();
	}

	function aficiones(){
		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();
		$datos = [
			'aficiones' => $aficiones
		];

		//print_r($aficiones);

		frame($this,'aficion/index',$datos);
	}


	public function create()
	{
		$data = [];
		frame($this,'aficion/create');
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('aficion_model');
		if( $nombre != null) { 
			if($this->aficion_model->getBeanByNombre($nombre) == null ) ) {
				$this->aficion_model->insert($nombre);
				$mensaje = 'La Afición <b>'.$nombre.'</b> ha sido creada correctamente.';
				prg('success', $mensaje, 'aficion/create');
			} else {
				$datos = [ 'mensaje'=>'EL nombre de la afición no puede ser nulo.' ];
			prg('error', $mensaje, 'aficion/create');
			}
		} else {
			$datos = [ 'mensaje'=>'EL nombre de la afición no puede ser nulo.' ];
			prg('error', $mensaje, 'aficion/create');
		}
		
	}

	public function delete()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			if($aficion) {
				$datos = [ 'aficion'=>$aficion ];
				frame($this,'aficion/delete',$datos);
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
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			if($aficion) {
				$this->aficion_model->delete($aficion);
				$datos = [ 'aficion'=>$aficion, 'mensaje'=> 'La afición <b>'.$aficion->nombre.'</b> ha sido eliminado correctamente.' ];
				frame($this,'aficion/confirm',$datos);
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
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			if($aficion) {
				$datos = [ 'aficion'=>$aficion ];
				frame($this,'aficion/update',$datos);
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
		$this->load->model('aficion_model');

		if( $id != null and $nombre != null and ($this->aficion_model->getBeanByNombreAndId($nombre, $id) == null ) ) {
			$this->aficion_model->update($id, $nombre);
			$datos = [ 'mensaje'=> 'La afición <b>'.$nombre.'</b> ha sido modificado correctamente.' ];
			frame($this,'aficion/confirm',$datos);
		} else {
			$datos = [ 'mensaje'=> 'Lo siento, ha habido un error.' ];
			frame($this,'aficion/error',$datos);
		}

	}

}
