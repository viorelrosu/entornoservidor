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
		//mklink /j rosuClaudiuViorel D:\workspacePHPVio\entornoservidor\clase\t6\pap

		$this->output->delete_cache();
		// $this->load->helper('mensaje');
		// $this->load->view('home/index');
		frame($this,'home/index');
	}

	public function init() {

		$this->load->model('pais_model');
		$pais = $this->pais_model->insert('España');

		$this->load->model('persona_model');
		$this->persona_model->insert('admin', 1, 'admin', $pais->id, [], 'admin');

		redirect(base_url());
	}
}
