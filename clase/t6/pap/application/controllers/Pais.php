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
		if( $nombre != null ) {
			if ( $this->pais_model->getBeanByNombre($nombre) == null ) {
				$this->pais_model->insert($nombre);

				$mensaje = 'El país <b>'.$nombre.'</b> ha sido dado de alta correctamente.';
				prg('success', $mensaje, 'pais/create');
			} else {
				$mensaje = 'Ya existe un país con el nombre <b>'.$nombre.'</b>.';
				prg('error',$mensaje,'pais/create');
			}
		} else {
			$mensaje = 'El nombre del país no puede ser nulo.';
			prg('error',$mensaje,'pais/create');
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
			$this->pais_model->delete($pais);
			$mensaje = 'El país <b>'.$pais->nombre.'</b> ha sido eliminado correctamente.';
			prg('success', $mensaje, 'pais/index');
		} else {
			$mensaje = 'No se puede dar de baja país.';
			prg('error', $mensaje, 'pais/index');
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
				$mensaje = 'No se pueden cargar los datos del país.';
				prg('error', $mensaje, 'pais/index');
			}
		} else {
			$mensaje = 'No se pueden cargar los datos del país.';
			prg('error', $mensaje, 'pais/index');
		}
	}

	public function updatePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$this->load->model('pais_model');

		if( $id != null and $nombre != null ) {
			if ($this->pais_model->getBeanByNombre($nombre) == null ) {
				$this->pais_model->update($id, $nombre);
				$mensaje = 'El país <b>'.$nombre.'</b> ha sido modificado correctamente.';
				prg('success', $mensaje, 'pais/index');
			} else {
				$mensaje = 'El país <b>'.$nombre.'</b> ya existe.';
				prg('error', $mensaje, 'pais/index');
			}
		} else {
			$mensaje = 'El nombre del país no puede ser null.';
			prg('error', $mensaje, 'pais/index');
		}

	}

}
