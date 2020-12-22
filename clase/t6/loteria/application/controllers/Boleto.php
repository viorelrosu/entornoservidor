<?php

class Boleto extends CI_Controller {
	function index() {

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Listado de Boletos';
		$datos['_nav']['active'] = 'boleto';
		$datos['_msg'] = getMsgSession();

		$user = getUserSession();

		$this->load->model('user_model');
		$datos['user'] = $this->user_model->getBeanById($user->id);

		$this->load->model('boleto_model');
		if(isRolValid('admin')){
			$datos['boletos'] = $this->boleto_model->getAll();
			$datos['intercambios'] = $this->boleto_model->getAllIntercambios();
		} else {
			$datos['boletos'] = $this->boleto_model->getAllByUserId($user->id);
		}

		frame($this,'boleto/index',$datos);
	}

	function create(){

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		if(isRolValid('admin')){
			$this->load->model('user_model');
			$datos['usuarios'] = $this->user_model->getAllByRol('usuario');
		}

		$datos['_head']['titulo'] = 'Alta Boleto';
		$datos['_nav']['active'] = 'boleto';
		$datos['_msg'] = getMsgSession();
		frame($this,'boleto/create',$datos);
	}

	function createPost(){

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$numero = $this->input->post('numero');
		$participacion = $this->input->post('participacion');

		if(isRolValid('admin')) {
			$idUser = $this->input->post('idUsuario');
		} else {
			$idUser = getUserSession()->id;
		}

		try {

			$this->load->model('boleto_model');
			$this->boleto_model->insert($numero, $participacion, $idUser);
			$mensaje = 'El boleto <b>'. $numero .'</b> se ha registrado correctamente.';
			prgBack('success',$mensaje,'boleto');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'boleto/create');

		}
	}

	function update(){

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Modificar Boleto';
		$datos['_nav']['active'] = 'boleto';
		$datos['_msg'] = getMsgSession();

		$id = $this->input->get('id');
		$this->load->model('boleto_model');
		$datos['boleto'] = $this->boleto_model->getById($id);

		if(isRolValid('admin')){
			$this->load->model('user_model');
			$datos['usuarios'] = $this->user_model->getAllByRol('usuario');
		}

		frame($this,'boleto/update', $datos);
	}

	function updatePost(){

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$id = $this->input->post('id');
		$numero = $this->input->post('numero');
		$participacion = $this->input->post('participacion');

		if(isRolValid('admin')) {
			$idUser = $this->input->post('idUsuario');
		} else {
			$idUser = getUserSession()->id;
		}

		try {

			$this->load->model('boleto_model');
			$this->boleto_model->update($id, $numero, $participacion, $idUser);
			$mensaje = 'El boleto <b>'. $numero .'</b> se ha modificado correctamente.';
			prgBack('success',$mensaje,'boleto');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'boleto/update?id='.$id);

		}
	}

	public function delete()
	{

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Baja Boleto';
		$datos['_nav']['active'] = 'boleto';

		$id = isset($_POST['id']) ? $_POST['id'] : null;

		try {
			$this->load->model('boleto_model');
			$datos['boleto'] = $this->boleto_model->getById($id);
			frame($this,'boleto/delete',$datos);
		} catch(Eception $e) {
			prgBack('danger',$e->getMessage(),'boleto');
		}

	}

	public function deletePost()
	{

		if(!isRolValid('admin') and !isRolValid('usuario')) {
			show_404();
		}

		$id = $this->input->post('id');

		try {
			$this->load->model('boleto_model');
			$boleto = $this->boleto_model->getById($id);
			$this->boleto_model->delete($boleto);
			$mensaje = 'El boleto <b>'.$boleto->numero.'</b> ha sido eliminado correctamente.';
			prgBack('success',$mensaje,'boleto');
		} catch(Exception $e) {
			prgBack('danger',$e->getMessage(),'boleto');
		}

	}

	function intercambio(){

		$datos['_head']['titulo'] = 'Intercambio Participación Boleto';
		$datos['_nav']['active'] = 'boleto';
		$datos['_msg'] = getMsgSession();

		$id = $this->input->get('id');
		$this->load->model('boleto_model');
		$datos['boleto'] = $this->boleto_model->getById($id);

		$this->load->model('user_model');
		$datos['usuarios'] = $this->user_model->getAllByRol('usuario');

		$user = getUserSession();
		$datos['user'] = $this->user_model->getBeanById($user->id);

		frame($this,'boleto/intercambio', $datos);
	}

	function intercambioPost(){
		$id = $this->input->post('id');
		$idUsuario = $this->input->post('idUsuario');
		$participacion = $this->input->post('participacion');

		try {

			$this->load->model('boleto_model');
			$intercambio = $this->boleto_model->intercambio($id, $idUsuario, $participacion);

			$mensaje = 'La participación de <b>'. $intercambio->user->nombre.'</b> con la cantidad de <b>'. $intercambio->participacion .' €</b> se ha registrado correctamente.';
			prgBack('success',$mensaje,'boleto');

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'boleto/intercambio?id='.$id);

		}
	}
}

?>