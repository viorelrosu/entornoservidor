<?php
class Login extends CI_Controller {
	
	public function index() {

		frame($this,'login/index');

	}

	public function check() {

		$dni = $this->input->post('inputDni');
		$pass = $this->input->post('inputPassword');

		$this->load->model('persona_model');
		
		try{
			$this->persona_model->login($dni,$pass);
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
}

?>