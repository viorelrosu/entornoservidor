<?php 

class User extends CI_Controller {

	function index() {

		if( !isRolValid('admin') ) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Listado Usuarios';
		$datos['_nav']['active'] = 'user';
		$datos['_msg'] = getMsgSession();

		$this->load->model('user_model');
		$datos['usuarios'] = $this->user_model->getAll();
		frame($this,'user/index',$datos);
	}

	public function login() {
		if( isRolValid('admin') or isRolValid('usuario') ) {
			redirect(base_url());
		}

		$datos['_head']['titulo'] = 'Iniciar Sesión';
		$datos['_msg'] = getMsgSession();
		frame($this, 'user/login',$datos);
	}

	public function loginPost() {

		$email = $this->input->post('inputEmail');
		$pass = $this->input->post('inputPassword');

		$this->load->model('user_model');

		try{
			$user = $this->user_model->login($email,$pass);

			if(session_status() == PHP_SESSION_NONE) {
    			session_start();
    		}
    		$_SESSION['_usuario'] = $user;

			redirect(base_url());
		}
		catch(Exception $e) {
			prgBack('danger',$e->getMessage(),'login');
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

	public function register() {
		$datos['_head']['titulo'] = 'Registro Usuario';
		$datos['_msg'] = getMsgSession();
		frame($this, 'user/register',$datos);
	}

	public function registerPost() {
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		try {

			$this->load->model('user_model');
			$this->user_model->insert($nombre, $email, $pass);
			$mensaje = 'El usuario <b>'. $nombre .'</b> ha sido registrado correctamente.';
			if( isRolValid('admin') ) {
				prgBack('success',$mensaje,'user');
			} else {
				prg('success',$mensaje,'home');
			}

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'user/register');

		}
	}

	public function update() {
		if( !isRolValid('admin') and !isRolValid('usuario') ) {
			show_404();
		}

		$datos['_head']['titulo'] = 'Modificar Usuario';
		$datos['_nav']['active'] = 'user';
		$datos['_msg'] = getMsgSession();

		$this->load->model('user_model');
		if( isRolValid('admin') ) {
			$id = $this->input->get('id');
			$datos['usuario'] = $this->user_model->getBeanById($id);
		} else {
			$datos['usuario'] = $this->user_model->getBeanById(getUserSession()->id);
		}

		frame($this,'user/update',$datos);
	}

	public function updatePost()
	{
		if( !isRolValid('admin') and !isRolValid('usuario') ) {
			show_404();
		}

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');

		try {

			$this->load->model('user_model');
			$user = $this->user_model->update($id, $nombre, $email);

			if( !isRolValid('admin') ) {
				if(session_status() == PHP_SESSION_NONE) {
	    			session_start();
	    		}
	    		$_SESSION['_usuario'] = $user;
	    	}

			$mensaje = 'Los datos se han sido modificado correctamente.';
			if( isRolValid('admin') ) {
				prgBack('success',$mensaje,'user');
			} else {
				prg('success',$mensaje,'home');
			}

		} catch(Exception $e) {

			prgBack('danger',$e->getMessage(),'user/update?id='.$id);

		}

	}

	public function delete()
	{

		if(!isRolValid('admin')) {
			show_404();
		}
		$datos['_head']['titulo'] = 'Baja Usuario';
		$datos['_nav']['active'] = 'user';

		$id = $this->input->post('id');

		try {
			$this->load->model('user_model');
			$datos['user'] = $this->user_model->getBeanById($id);
			frame($this,'user/delete',$datos);
		} catch(Eception $e) {
			prg('error',$e->getMessage(),'user/index');
		}

	}

	public function deletePost()
	{

		if(!isRolValid('admin')) {
			show_404();
		}

		$id = $this->input->post('id');

		try {
			$this->load->model('user_model');
			$user = $this->user_model->getBeanById($id);

			$this->load->model('boleto_model');
			$this->boleto_model->deleteParticipacionesByUser($user);

			$this->user_model->delete($user);

			$mensaje = 'El usuario <b>'.$user->nombre.'</b> ha sido eliminado correctamente.';
			prgBack('success',$mensaje,'user');
		} catch(Exception $e) {
			prgBack('danger',$e->getMessage(),'user');
		}

	}
}


?>