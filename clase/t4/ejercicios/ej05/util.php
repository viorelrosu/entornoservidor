<?php

	$bdEmpleados = [
		['Pepe','García','637 222 654'],
		['Ana','García','637 111 654'],
		['Manolo','González','637 000 654'],
	];

	function isEmpleadoFilter($index, $filterBy, $text){
		global $bdEmpleados;
		$text = strtolower($text);
		$res = false;
		switch ($filterBy) {
	    	case 'nombre':
	    		$res = strpos(strtolower($bdEmpleados[$index][0]), $text);
	    		break;

	    	case 'apellido':
	    		$res = strpos(strtolower($bdEmpleados[$index][1]), $text);
	    		break;

	    	case 'telefono':
	    		$res = strpos(strtolower($bdEmpleados[$index][2]), $text);
	    		break;

	    	default:
	    		$res = strpos(strtolower($bdEmpleados[$index][0]), $text);
	    		break;
	    }
		return ( $res === false ? false : true );
	}

	function getHtmlTitle($texto, $linea=true){
		$lineaHr = $linea ? '<hr />' : '';
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h2 class="text-center">$texto</h2>
					$lineaHr
				</div>
			</div>
		HTML;

		return $html;
	}

	function getHtmlFooter(){
		$html = <<<HTML
			<footer>
				<div class="row">
					<div class="col-md-6 offset-md-3 text-muted">
						<hr />
						&copy; DAW2 Entorno Servidor - Ejercicio 05 | Viorel Rosu
					</div>
				</div>
			</footer>
		HTML;

		return $html;
	}

	function getHtmlAlert($tipo='info', $text) {
		$class = "alert-$tipo";
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="alert $class" role="alert">
				  		$text
					</div>
				</div>
			</div>
		HTML;
		return $html;
	}
?>