<?php
	class Baza extends CI_Controller {

		function index(){
			$this->load->model('baza_model');
			$bazas = $this->baza_model->getAll();

			$this->load->model('jugador_model');
			$jugadores = $this->jugador_model->getAll();

			$datos = [ 'bazas'=>$bazas, 'jugadores'=>$jugadores ];
			frame($this,'baza/index',$datos);
		}

		function create(){
			$this->load->model('baza_model');
			$bazas = $this->baza_model->getAll();

			$this->load->model('jugador_model');
			$jugadores = $this->jugador_model->getAll();

			$datos = [ 'jugadores' => $jugadores, 'numero' => (count($bazas)+1) ];

			frame($this,'baza/create',$datos);
		}

		function createPost(){
			$numero = $this->input->post('numero');
			$puntuaciones = [];
			$this->load->model('jugador_model');
			$jugadores = $this->jugador_model->getAll();
			foreach( $jugadores as $jugador) {
				$puntuacion = $this->input->post('jug-'.$jugador->id);
				if($puntuacion != null) {
					$puntuaciones[] = [ 'jugador'=> $jugador, 'puntuacion'=>$puntuacion];
				}
			}

			try {

				$this->load->model('baza_model');
				$this->baza_model->insert($numero, $puntuaciones);
				$mensaje = 'La baza <b>'. $nombre .'</b> ha sido creado correctamente.';
				prg('success',$mensaje,'baza/index');

			} catch(Exception $e) {
				prg('error',$e->getMessage(),'baza/create');
			}

		}
	}
?>