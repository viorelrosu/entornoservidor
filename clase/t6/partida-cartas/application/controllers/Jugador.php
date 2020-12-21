<?php
	class Jugador extends CI_Controller {

		function index(){
			$this->load->model('jugador_model');
			$jugadores = $this->jugador_model->getAll();
			$datos = [ 'jugadores'=>$jugadores ];
			frame($this,'jugador/index',$datos);
		}

		function create(){
			frame($this,'jugador/create');
		}

		function createPost(){
			$nombre = $this->input->post('nombre');

			try {

				$this->load->model('jugador_model');
				$this->jugador_model->insert($nombre);
				$mensaje = 'El jugador <b>'. $nombre .'</b> ha sido creado correctamente.';
				prg('success',$mensaje,'jugador/create');

			} catch(Exception $e) {

				prg('error',$e->getMessage(),'jugador/create');

			}

		}
	}
?>