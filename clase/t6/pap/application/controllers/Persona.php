<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function index()
	{
		$this->personas();
	}

	function personas(){
		$this->load->model('persona_model');
		$personas = $this->persona_model->getAll();
		$datos = [
			'personas' => $personas
		];

		frame($this,'persona/index',$datos);
	}


	public function create()
	{
		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();

		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();

		$datos = [ 'aficiones'=>$aficiones, 'paises' => $paises  ];
		frame($this,'persona/create',$datos);
	}

	public function createPost()
	{
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
		$idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
		$idsAficiones = isset($_POST['idsAficiones']) ? $_POST['idsAficiones'] : null;

		$this->load->model('persona_model');
		if( $nombre != null and $dni != null and $idPais != null and $idsAficiones != null) {

			if  ($this->persona_model->getBeanByDni($dni) == null ) {

				$this->persona_model->insert($nombre, $dni, $idPais, $idsAficiones);
				$mensaje = 'La persona <b>'. $nombre .'</b> ha sido creada correctamente.';
				prg('success',$mensaje,'persona/create');

			} else {

				$mensaje = 'Lo siento, ya existe persona con este dni.';
				prg('error',$mensaje,'persona/create');

			}

		} else {

			$mensaje = 'Lo siento, los datos no pueden ser nulos.';
			prg('error',$mensaje,'persona/create');

		}

	}

	public function update() {
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();

		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();

		$datos = [ 'aficiones'=>$aficiones, 'paises' => $paises ];

		if($id != null) {
			$this->load->model('persona_model');
			$persona = $this->persona_model->getBeanById($id);

			if($persona) {
				$datos['persona'] = $persona;
				frame($this,'persona/update',$datos);
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
		$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
		$idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
		$idsAficiones = isset($_POST['idsAficiones']) ? $_POST['idsAficiones'] : null;
		$this->load->model('persona_model');

		if( $id != null and $nombre != null and $dni != null and $idPais != null and $idsAficiones != null) {

			if  ($this->persona_model->getBeanByDniAndId($dni,$id) == null ) {
				$this->persona_model->update($id, $nombre, $dni, $idPais, $idsAficiones);
				$mensaje = 'La persona <b>'. $nombre .'</b> ha sido midificada correctamente.';
				prg('success',$mensaje,'persona/update');
			} else {
				$mensaje = 'Lo siento, ya existe persona con este dni.';
				prg('error',$mensaje,'persona/update');
			}

		} else {

			$mensaje = 'Lo siento, los datos no pueden ser nulos.';
			prg('error',$mensaje,'persona/update');

		}

	}

	public function delete()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		if( $id != null ) {
			$this->load->model('persona_model');
			$persona = $this->persona_model->getBeanById($id);
			if($persona) {
				$datos = [ 'persona'=>$persona ];
				frame($this,'persona/delete',$datos);
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
			$this->load->model('persona_model');
			$persona = $this->persona_model->getBeanById($id);
			if($persona) {
				$this->persona_model->delete($persona);
				$mensaje = 'La afición <b>'.$persona->nombre.'</b> ha sido eliminado correctamente.';
				prg('success',$mensaje,'persona');
			} else {
				$this->index();
			}
		} else {
			$this->index();
		}

	}


}
