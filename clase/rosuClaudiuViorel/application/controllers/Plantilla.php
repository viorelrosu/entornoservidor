<?php

	class Controller extends CI_Controller {
		function index(){
			frame($this,'jugador/index',$datos);
		};

		function create(){
			frame($this,'jugador/create',$datos);
		};

		function createPost(){
			$nombre = $this->input->post('nombre');

			try {

				$this->load->model('jugador_model');
				$this->jugador_model->insert($nombre);
				$mensaje = 'El jugador <b>'. $nombre .'</b> ha sido creado correctamente.';
				prg('success',$mensaje,'jugador/create');

			} catch(Exception $e) {

				$mensaje = 'Lo siento, los datos no pueden ser nulos.';
				prg('error',$e->getMessage(),'jugador/create');

			}

		};
	}

?>