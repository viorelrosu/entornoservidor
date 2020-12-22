<?php

class Premio extends CI_Controller {
	function index() {
		$datos['_head']['titulo'] = 'Listado Premios';
		$datos['_nav']['active'] = 'premio';
		$datos['_msg'] = getMsgSession();

		$this->load->model('premio_model');
		$datos['premios'] = $this->premio_model->getAll();
		frame($this,'premio/index',$datos);
	}

	function create(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Alta Premio';
		$datos['_nav']['active'] = 'premio';
		$datos['_msg'] = getMsgSession();

		$this->load->model('tipo_model');
		$datos['tipos'] = $this->tipo_model->getAll();

		frame($this,'premio/create',$datos);
	}

	function createPost(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$numero = $this->input->post('numero');
		$idTipo = $this->input->post('idTipo');

		try {

			$this->load->model('premio_model');
			$this->premio_model->insert($numero, $idTipo);
			$mensaje = 'El premio <b>'. $numero .'</b> se ha registrado correctamente.';
			prgBack('success',$mensaje,'premio');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'premio/create');

		}
	}

	function update(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Modificar Premio';
		$datos['_nav']['active'] = 'premio';
		$datos['_msg'] = getMsgSession();

		$id = $this->input->get('id');
		$this->load->model('premio_model');
		$datos['premio'] = $this->premio_model->getById($id);

		$this->load->model('tipo_model');
		$datos['tipos'] = $this->tipo_model->getAll();

		frame($this,'premio/update', $datos);
	}

	function updatePost(){

		if(!isRolValid('admin')) {
			show_404();
		}

		$id = $this->input->post('id');
		$numero = $this->input->post('numero');
		$idTipo = $this->input->post('idTipo');

		try {

			$this->load->model('premio_model');
			$this->premio_model->update($id, $numero, $idTipo);
			$mensaje = 'El premio <b>'. $numero .'</b> se ha modificado correctamente.';
			prgBack('success',$mensaje,'premio');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'premio/update?id='.$id);

		}
	}

	public function delete()
	{

		if(!isRolValid('admin')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Baja Premio';
		$datos['_nav']['active'] = 'premio';

		$id = $this->input->post('id');

		try {
			$this->load->model('premio_model');
			$datos['premio'] = $this->premio_model->getById($id);
			frame($this,'premio/delete',$datos);
		} catch(Eception $e) {
			prgBack('danger',$e->getMessage(),'premio');
		}

	}

	public function deletePost()
	{

		if(!isRolValid('admin')) {
			show_404();
		}

		$id = $this->input->post('id');

		try {
			$this->load->model('premio_model');
			$premio = $this->premio_model->getById($id);
			$this->premio_model->delete($premio);
			$mensaje = 'El premio <b>'.$premio->numero.'</b> ha sido eliminado correctamente.';
			prgBack('success',$mensaje,'premio');
		} catch(Exception $e) {
			prgBack('danger',$e->getMessage(),'premio');
		}

	}
}

?>