<?php

	class Resultado extends CI_Controller {
		function listar(){
			$idJornada = $this->input->get('j');
			$this->load->model('jornada_model');
			$jornada =  $this->jornada_model->getById($idJornada);
			
			$datos = [ 'jornada'=>$jornada ];
			frame($this,'resultado/listar',$datos);
		}

		function create(){
			$this->load->model('equipo_model');
			$equipos = $this->equipo_model->getAll();

			$this->load->model('jornada_model');
			$jornadas = $this->jornada_model->getAll();

			$datos = [ 'equipos'=>$equipos, 'jornadas'=>$jornadas ];
			frame($this,'resultado/create', $datos);
		}

		function createPost(){
			$idJornada = $this->input->post('idJornada');
			$idEquipoLocal = $this->input->post('idEquipoLocal');
			$idEquipoVisitante = $this->input->post('idEquipoVisitante');
			$golesEquipoLocal = $this->input->post('golesEquipoLocal');
			$golesEquipoVisitante = $this->input->post('golesEquipoVisitante');

			try {

				$this->load->model('resultado_model');
				$this->resultado_model->insert(
					$idJornada,
					$idEquipoLocal,
					$golesEquipoLocal,
					$idEquipoVisitante,
					$golesEquipoVisitante
				);
				$mensaje = 'El resultado <b>'. $nombre .'</b> ha sido registrado correctamente.';
				prg('success',$mensaje, base_url());

			} catch(Exception $e) {

				prg('error',$e->getMessage(),'resultado/create');

			}
		}
	}

?>