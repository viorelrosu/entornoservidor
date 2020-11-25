<?php


class Hola extends CI_Controller {

	function index(){
		//$this->load->view('hola/index.php');
		$this->h();
	}

	function h($nombre='John',$apellido='Doe'){
		//$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'John';
		//$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : 'Doe';
		$this->load->helper('url');
		$mensaje = 'Hola mundo';
		$datos = [ 'mensaje'=>$mensaje, 'nombre'=>$nombre, 'apellido'=>$apellido ];
		$this->load->view('hola/hola',$datos);
	}

	function ejercicio(){
		$this->load->helper('url');
		$datos = ['etiquetas'=>[]];
		$datos['etiquetas'][] = [ 'nombre' => 'Bing', 'enlace'=>'http://bing.com'];
		$datos['etiquetas'][] = [ 'nombre' => 'Google', 'enlace'=>'http://google.com'];
		$datos['etiquetas'][] = [ 'nombre' => 'Yahoo', 'enlace'=>'http://yahoo.com'];
		$this->load->view('hola/ejercicio',$datos);
	}
}

?>