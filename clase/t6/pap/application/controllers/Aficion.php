<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aficion extends CI_Controller {

	public function index()
	{
		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();
		$datos = [
			'aficiones' => $aficiones
		];

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
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		try {
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			$datos = [ 'aficion'=>$aficion ];
			frame($this,'aficion/delete',$datos);
		}
		catch (Exception $e) {
			prg('error', $e->getMessage(), 'aficion/index');
		}

	}

	public function deletePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;

		try{
			$this->load->model('aficion_model');
			$this->aficion_model->deleteById($id);
			prg('success', 'La afición ha sido eliminado correctamente.', 'aficion/index');
		}
		catch(Exception $e) {
			prg('error', $e->getMessage(), 'aficion/index');
		}

	}

	public function update() {
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		try{
			$this->load->model('aficion_model');
			$aficion = $this->aficion_model->getBeanById($id);
			$datos = [ 'aficion'=>$aficion ];
			frame($this,'aficion/update',$datos);
		} catch (Exception $e) {
			prg('error', $e->getMessage(), 'aficion/index');
		}
	}

	public function updatePost()
	{
		$id = isset($_POST['id']) ? $_POST['id'] : null;
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

		try{
			$this->load->model('aficion_model');
			$this->aficion_model->update($id, $nombre);
			prg('success', 'La afición ha sido modificado correctamente.', 'aficion/index');
		} catch(Exception $e) {
			prg('error', $e->getMessage(), 'aficion/index');
		}

	}

}
