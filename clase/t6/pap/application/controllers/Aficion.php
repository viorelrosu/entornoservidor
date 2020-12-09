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
		frame($this,'aficion/create');
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('aficion_model');
		
		try{
			$this->aficion_model->insert($nombre);
			redirect(base_url().'aficion/index');
		}
		catch(Exception $e){
			prg('error', $e->getMessage(), 'aficion/create');
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
				$mensaje = 'No se han podido cargar los datos de la afición.';
				prg('error', $mensaje, 'aficion/index');
			}
		} else {
			$mensaje = 'No se han podido cargar los datos de la afición.';
			prg('error', $mensaje, 'aficion/index');
		}

	}

	public function deletePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			$this->aficion_model->delete($aficion);
			$mensaje = 'La afición <b>'.$aficion->nombre.'</b> ha sido eliminado correctamente.';
			prg('success', $mensaje, 'aficion/index');
		} else {
			$mensaje = 'No se han podido cargar los datos de la afición.';
			prg('error', $mensaje, 'aficion/index');
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
				$mensaje = 'No se han podido cargar los datos de la afición.';
				prg('error', $mensaje, 'aficion/index');
			}
		} else {
			$mensaje = 'No se han podido cargar los datos de la afición.';
			prg('error', $mensaje, 'aficion/index');
		}
	}

	public function updatePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('aficion_model');

		if( $id != null and $nombre != null) {
			if($this->aficion_model->getBeanByNombreAndId($nombre, $id) == null ) {
				$this->aficion_model->update($id, $nombre);
				$mensaje = 'La afición <b>'.$nombre.'</b> ha sido modificado correctamente.';
				prg('success', $mensaje, 'aficion/index');
			} else {
				$mensaje = 'No se han podido cargar los datos de la afición.';
				prg('error', $mensaje, 'aficion/index');
			}
		} else {
			$mensaje = 'EL nombre de la afición no puede ser nulo.';
			prg('error', $mensaje, 'aficion/index');
		}

	}

}
