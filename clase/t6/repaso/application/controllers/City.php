<?php

	class City extends CI_Controller {

	public function index()
	{
		$this->load->model('city_model');
		$cities = $this->city_model->getAll();
		$datos = [
			'cities' => $cities
		];

		frame($this,'city/index',$datos);
	}


	public function create()
	{
		$this->load->model('country_model');
		$countries = $this->country_model->getAll();

		$datos = [ 'countries'=>$countries ];

		frame($this,'city/create',$datos);
	}

	public function createPost()
	{
		$name = $this->input->post('name');
		$idCountry = $this->input->post('idCountry');
		try {

			$this->load->model('city_model');
			$this->city_model->insert($name,$idCountry);
			$mensaje = 'El city <b>'. $name .'</b> ha sido creada correctamente.';
			prg('success',$mensaje,'city/create');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'city/create');

		}

	}

}

?>