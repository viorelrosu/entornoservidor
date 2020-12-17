<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

	public function index()
	{
		$this->load->model('empleado_model');
		$empleados = $this->empleado_model->getAll();
		$datos = [
			'empleados' => $empleados
		];

		frame($this,'empleado/index',$datos);
	}


	public function create()
	{
		$this->load->model('lenguaje_model');
		$lenguajes = $this->lenguaje_model->getAll();

		$this->load->model('ciudad_model');
		$ciudades = $this->ciudad_model->getAll();

		$datos = [ 'lenguajes'=>$lenguajes, 'ciudades' => $ciudades  ];
		frame($this,'empleado/create',$datos);
	}

	public function createPost()
	{
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$idCiudad = $this->input->post('idCiudad');
		$idsLenguajes = $this->input->post('idsLenguajes');

		// try {

			$this->load->model('empleado_model');
			$this->empleado_model->insert($nombre, $apellidos, $telefono, $idCiudad, $idsLenguajes);
			$mensaje = 'La persona <b>'. $nombre .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'empleado/index');

		// } catch(Exception $e) {

		// 	prg('error',$e->getMessage(),'empleado/create');

		// }

	}

	public function update() {
		$id = $this->input->get('id');

		$this->load->model('lenguaje_model');
		$lenguajes = $this->lenguaje_model->getAll();

		$this->load->model('ciudad_model');
		$ciudades = $this->ciudad_model->getAll();

		$this->load->model('empleado_model');
		$empleado = $this->empleado_model->getBeanById($id);

		$datos = [
			'lenguajes'=>$lenguajes,
			'ciudades' => $ciudades,
			'empleado' => $empleado
		];

		frame($this,'empleado/update',$datos);
	}

	public function updatePost()
	{
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$telefono = $this->input->post('telefono');
		$idCiudad = $this->input->post('idCiudad');
		$idsLenguajes = $this->input->post('idsLenguajes');
		//print_r($this->input->post());

		// try {

			$this->load->model('empleado_model');
			$this->empleado_model->update($id, $nombre, $apellidos, $telefono, $idCiudad, $idsLenguajes);
			$mensaje = 'El empleado <b>'. $nombre .'</b> ha sido modificado correctamente.';
			prg('success',$mensaje,'empleado/index');

		// } catch(Exception $e) {

		// 	prg('error',$e->getMessage(),'empleado/update/?id='.$id);

		// }

	}

	public function delete()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		try {
			$this->load->model('empleado_model');
			$empleado = $this->empleado_model->getBeanById($id);
			$datos = [ 'empleado'=>$empleado ];
			frame($this,'empleado/delete',$datos);
		} catch(Exception $e){
			prg('error',$e->getMessage(),'empleado/index');
		}

	}

	public function deletePost()
	{
		//$id = isset($_POST['id']) ? $_POST['id'] : null;
		$id = $this->input->post('id');

		try {
			$this->load->model('empleado_model');
			$empleado = $this->empleado_model->getBeanById($id);
			$this->empleado_model->delete($empleado);
			$mensaje = 'El empleado <b>'.$empleado->nombre.'</b> ha sido eliminado correctamente.';
			prg('success',$mensaje,'empleado');
		} catch(Exception $e) {
			prg('error',$e->getMessage(),'empleado');
		}

	}


}
