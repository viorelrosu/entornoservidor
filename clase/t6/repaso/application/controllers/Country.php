<?php

	class Country extends CI_Controller {

	public function index()
	{
		$this->load->model('country_model');
		$countries = $this->country_model->getAll();
		$datos = [
			'countries' => $countries
		];

		frame($this,'country/index',$datos);
	}


	public function create()
	{
		frame($this,'country/create');
	}

	public function createPost()
	{
		$name = $this->input->post('name');
		try {

			$this->load->model('country_model');
			$this->country_model->insert($name);
			$mensaje = 'El country <b>'. $name .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'country/create');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'country/create');

		}

	}

}

?>