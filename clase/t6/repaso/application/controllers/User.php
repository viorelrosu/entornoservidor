<?php

	class User extends CI_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$users = $this->user_model->getAll();
		$datos = [
			'users' => $users
		];

		frame($this,'user/index',$datos);
	}


	public function create()
	{
		$this->load->model('city_model');
		$cities = $this->city_model->getAll();

		$datos = [ 'cities'=>$cities ];

		frame($this,'user/create',$datos);
	}

	public function createPost()
	{
		$dni = $this->input->post('dni');
		$name = $this->input->post('name');
		$idCity = $this->input->post('idCity');
		try {

			$this->load->model('user_model');
			$this->user_model->insert($dni,$name,$idCity);
			$mensaje = 'El user <b>'. $name .'</b> ha sido creado correctamente.';
			prg('success',$mensaje,'user/create');

		} catch(Exception $e) {

			prg('error',$e->getMessage(),'user/create');

		}

	}

	public function createTravel()
	{
		$this->load->model('user_model');
		$users = $this->user_model->getAll();

		$this->load->model('city_model');
		$cities = $this->city_model->getAll();

		$datos = [ 'users'=>$users, 'cities'=>$cities ];

		frame($this,'user/travel',$datos);
	}

	public function createTravelPost(){
		$idUser = $this->input->post('idUser');
		$idsCity = $this->input->post('idsCity');

		try {
			$this->load->model('user_model');
			$this->user_model->insertTravel($idUser,$idsCity);
			$mensaje = 'El travel ha sido creado correctamente.';
			prg('success',$mensaje,'user/index');
		} catch(Exception $e) {

			prg('error',$e->getMessage(),'user/createTravel');

		}
	}

}

?>