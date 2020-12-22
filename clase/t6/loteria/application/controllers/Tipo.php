<?php

class Tipo extends CI_Controller {
	function index() {
		$datos['_head']['titulo'] = 'Listado Tipos Premio';
		$datos['_nav']['active'] = 'tipo';
		$datos['_msg'] = getMsgSession();

		$this->load->model('tipo_model');
		$datos['tipos'] = $this->tipo_model->getAll();

		frame($this,'tipo/index',$datos);
	}

	function create(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Alta Tipo Premio';
		$datos['_nav']['active'] = 'tipo';
		$datos['_msg'] = getMsgSession();

		frame($this,'tipo/create',$datos);
	}

	function createPost(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$nombre = $this->input->post('nombre');
		$multiplicador = $this->input->post('multiplicador');

		try {

			$this->load->model('tipo_model');
			$this->tipo_model->insert($nombre, $multiplicador);
			$mensaje = 'El tipo <b>'. $nombre .'</b> se ha registrado correctamente.';
			prgBack('success',$mensaje,'tipo');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'tipo/create');

		}
	}

	function update(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Modificar Tipo Premio';
		$datos['_nav']['active'] = 'tipo';
		$datos['_msg'] = getMsgSession();

		$id = $this->input->get('id');
		$this->load->model('tipo_model');

		$datos['tipo'] = $this->tipo_model->getById($id);
		frame($this,'tipo/update', $datos);
	}

	function updatePost(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$multiplicador = $this->input->post('multiplicador');

		try {

			$this->load->model('tipo_model');
			$this->tipo_model->update($id, $nombre, $multiplicador);
			$mensaje = 'El tipo <b>'. $nombre .'</b> se ha modificado correctamente.';
			prgBack('success',$mensaje,'tipo');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'tipo/update?id='.$id);

		}
	}

	public function delete()
	{

		if(!isRolValid('admin')) {
			show_404();
		}
		$datos['_head']['titulo'] = 'Baja Tipo Premio';
		$datos['_nav']['active'] = 'tipo';
		$datos['_msg'] = getMsgSession();

		$id = $this->input->post('id');

		try {
			$this->load->model('tipo_model');
			$datos['tipo'] = $this->tipo_model->getById($id);
			frame($this,'tipo/delete',$datos);
		} catch(Eception $e) {
			prgBack('danger',$e->getMessage(),'tipo');
		}

	}

	public function deletePost()
	{

		if(!isRolValid('admin')) {
			show_404();
		}

		$id = $this->input->post('id');

		try {
			$this->load->model('tipo_model');
			$tipo = $this->tipo_model->getById($id);
			$this->tipo_model->delete($tipo);
			$mensaje = 'El tipo <b>'.$tipo->nombre.'</b> ha sido eliminado correctamente.';
			prgBack('success',$mensaje,'tipo');
		} catch(Exception $e) {
			prgBack('danger',$e->getMessage(),'tipo');
		}

	}
}

?>