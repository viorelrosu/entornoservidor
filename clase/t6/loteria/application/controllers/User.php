<?php 

class User extends CI_Controller {

	public function login() {
		frame($this, 'user/login');
	}

	public function register() {
		frame($this, 'user/register');
	}

	public function registerPost() {
		$nombre = $this->input->post('nombre');
		$email = $this->input->post('email');
		$dni = $this->input->post('dni');
		$pass = $this->input->post('password');

		try {

			$this->load->model('user_model');
			$this->user_model->insert($nombre, $email, $dni, $pass);
			$mensaje = 'La user_'. $nombre .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'user/create');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'user/create');

		}
	}
}


?>