<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->model('user_model');
		$this->load->model('tipo_model');
		$datos['_nav']['active'] = 'inicio';
		$datos['init_admin'] = $this->user_model->getBeanByRol('admin');
		$datos['usuarios'] = $this->user_model->getAll();
		$datos['roles'] = $this->user_model->getAllRoles();
		$datos['tipos'] = $this->tipo_model->getAll();
		if($this->user_model->getBeanByRol('admin')) {
			frame($this,'home/index',$datos);
		} else {
			frame_init($this, 'home/init');
		}
	}

	public function init() {

		try {
			$this->load->model('init_model');
			$this->init_model->iniciar_db();
			redirect( base_url() );
		} catch(Exception $e){
			prg('error',$e->getMessage(),'home');
		}

	}
}
