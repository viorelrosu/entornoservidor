<?php

	class Equipo extends CI_Controller {
		function index(){
			$this->load->model('equipo_model');
			$equipos = $this->equipo_model->getAll();
			$datos = [ 'equipos'=>$equipos ];
			frame($this,'equipo/index',$datos);
		}

		function create(){
			frame($this,'equipo/create');
		}

		function createPost(){
			$nombre = $this->input->post('nombre');

			try {

				$this->load->model('equipo_model');
				$this->equipo_model->insert($nombre);
				$mensaje = 'El equipo <b>'. $nombre .'</b> ha sido creado correctamente.';
				prg('success',$mensaje,'equipo/create');

			} catch(Exception $e) {

				prg('error',$e->getMessage(),'equipo/create');

			}
		}
	}

?>