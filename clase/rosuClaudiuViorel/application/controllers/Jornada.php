<?php

	class Jornada extends CI_Controller {
		function index(){
			$this->load->model('jornada_model');
			$jornadas = $this->jornada_model->getAll();
			$datos = [ 'jornadas'=>$jornadas ];
			frame($this,'jornada/index',$datos);
		}

		function create(){
			frame($this,'jornada/create');

		}

		function createPost(){
			$numero = $this->input->post('numero');
			$fechaInicio = $this->input->post('fechaInicio');
			$fechaFin = $this->input->post('fechaFin');

			try {

				$this->load->model('jornada_model');
				$this->jornada_model->insert($numero,$fechaInicio,$fechaFin);
				$mensaje = 'La jornada <b>'. $número .'</b> ha sido creado correctamente.';
				prg('success',$mensaje,'jornada/create');

			} catch(Exception $e) {

				prg('error',$e->getMessage(),'jornada/create');

			}

		}
	}

?>