<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function index()
	{
		$this->load->model('persona_model');
		$personas = $this->persona_model->getAll();
		$datos = [
			'personas' => $personas
		];

		frame($this,'persona/index',$datos);
	}


	public function create()
	{
		if(!isRolValid('usuario') && !isRolValid('admin') ) {
			//prg('error','No tienes permisos.');
			show_404();
		}

		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();

		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();

		$datos = [ 'aficiones'=>$aficiones, 'paises' => $paises  ];
		frame($this,'persona/create',$datos);
	}

	public function createPost()
	{
		if(!isRolValid('usuario') && !isRolValid('admin') ) {
			//prg('error','No tienes permisos.');
			show_404();
		}

		$nombre = $this->input->post('nombre');
		$dni = $this->input->post('dni');
		$pass = $this->input->post('password');
		$idPais = $this->input->post('idPais');
		$idsAficiones = $this->input->post('idsAficiones');

		try {

			$this->load->model('persona_model');
			$this->persona_model->insert($nombre, $dni, $pass, $idPais, $idsAficiones);
			$mensaje = 'La persona <b>'. $nombre .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'persona/create');

		} catch(Exception $e) {

			$mensaje = 'Lo siento, los datos no pueden ser nulos.';
			prg('error',$e->getMessage(),'persona/create');

		}

	}

	public function update() {
		if(!isRolValid('usuario') && !isRolValid('admin') ) {
			//prg('error','No tienes permisos.');
			show_404();
		}

		$id = $this->input->get('id');

		$this->load->model('aficion_model');
		$aficiones = $this->aficion_model->getAll();

		$this->load->model('pais_model');
		$paises = $this->pais_model->getAll();

		$this->load->model('persona_model');
		$persona = $this->persona_model->getBeanById($id);

		$datos = [
			'aficiones'=>$aficiones,
			'paises' => $paises,
			'persona' => $persona
		];

		frame($this,'persona/update',$datos);
	}

	public function updatePost()
	{
		if(!isRolValid('usuario') && !isRolValid('admin') ) {
			//prg('error','No tienes permisos.');
			show_404();
		}

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$dni = $this->input->post('dni');
		$idPais = $this->input->post('idPais');
		$idsAficiones = $this->input->post('idsAficiones');

		try {

			$this->load->model('persona_model');
			$this->persona_model->update($id, $nombre, $dni, $idPais, $idsAficiones);
			$mensaje = 'La persona <b>'. $nombre .'</b> ha sido modificada correctamente.';
			prg('success',$mensaje,'persona/index');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'persona/update/?id='.$id);

		}

	}

	// public function delete()
	// {

	//	if(!isRolValid('usuario')) {
	//		//prg('error','No tienes permisos.');
	//		show_404();
	//	}

	// 	$id = isset($_POST['id']) ? $_POST['id'] : null;

	// 	if( $id != null ) {
	// 		$this->load->model('persona_model');
	// 		$persona = $this->persona_model->getBeanById($id);
	// 		if($persona) {
	// 			$datos = [ 'persona'=>$persona ];
	// 			frame($this,'persona/delete',$datos);
	// 		} else {
	// 			$mensaje = 'Lo siento, datos insuficientes.';
	// 			prg('error',$mensaje,'persona/index');
	// 		}
	// 	} else {
	// 		$mensaje = 'Lo siento, datos insuficientes.';
	// 		prg('error',$mensaje,'persona/index');
	// 	}

	// }

	public function deletePost()
	{

		if(!isRolValid('admin')) {
			//prg('error','No tienes permisos.');
			show_404();
		}

		//$id = isset($_POST['id']) ? $_POST['id'] : null;
		$id = $this->input->post('id');

		try {
			$this->load->model('persona_model');
			$persona = $this->persona_model->getBeanById($id);
			$this->persona_model->delete($persona);
			$mensaje = 'La afición <b>'.$persona->nombre.'</b> ha sido eliminado correctamente.';
			prg('success',$mensaje,'persona');
		} catch(Exception $e) {
			prg('error',$e->getMessage(),'persona');
		}

	}

	public function login(){
		frame($this,'login/index');
	}

	public function loginPost() {

		$dni = $this->input->post('inputDni');
		$pass = $this->input->post('inputPassword');

		$this->load->model('persona_model');

		try{
			$persona = $this->persona_model->login($dni,$pass);

			if(session_status() == PHP_SESSION_NONE) {
    			session_start();
    		}
    		$_SESSION['_usuario'] = $persona;

			redirect(base_url());
		}
		catch(Exception $e) {
			//prg('error','Datos incorrectos','login');
			prg('error',$e->getMessage(),'login');
		}

	}

	public function logout(){
		if(session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(isset($_SESSION['_usuario'])) {
			unset($_SESSION['_usuario']);
		}
		prg('success', 'Hasta la próxima');
	}


}
