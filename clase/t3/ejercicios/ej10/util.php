<?php

	function getHtmlTitle($texto, $linea=true){
		$lineaHr = $linea ? '<hr />' : '';
		$html = <<<HTML
			<div class="row">
				<div class="col-md-4 offset-md-4">
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
					<div class="col-md-4 offset-md-4 text-muted">
						<hr />
						&copy; DAW2 Entorno Servidor - Ejercicio 10 | Viorel Rosu
					</div>
				</div>
			</footer>
		HTML;

		return $html;
	}

	function getHtmlTareas($empleado, $nuevo = false) {

		$tareas = $_SESSION['usuarios'][$empleado]['tareas'];
		$htmlTareas = '';
		if ( sizeof ($tareas) > 0 ) {
			$htmlTrs = ''; $index=0;
			foreach($tareas as $key => $tarea) {
				$index++;
				if($nuevo && $key == array_key_last ( $tareas )){
					$tdHtml = '<td><b>'.$tarea.'</b> <span class="badge badge-pill badge-primary">Nueva</span></td>';
				} else {
					$tdHtml = "<td>$tarea</td>";
				}
				$htmlTrs .= <<<HTML
					<tr>
				      <th scope="row">$index</th>
				      $tdHtml
				    </tr>
				HTML;
			}

			//creamos la tabla
			$htmlTareas .= <<<HTML
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Tarea</th>
				    </tr>
				  </thead>
				  <tbody>
				  	$htmlTrs
				  </tbody>
				</table>
			HTML;
		} else {
			$htmlTareas .= <<<HTML
				<div class="alert alert-danger" role="alert">
			  		Lo siento, no hay tareas.
				</div>
			HTML;
		}

		return $htmlTareas;
	}

	function htmlTareasEmpleados(){
		$html = '';
		$empleados = $_SESSION['usuarios'];
		foreach($empleados as $empleado => $item) {
			$html .= '<h3>'.$empleado.'</h3>';
			$html .= getHtmlTareas($empleado);
		}

		return $html;
	}

	function getHtmlAlert($tipo='info', $text) {
		$class = "alert-$tipo";
		$html = <<<HTML
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<div class="alert $class" role="alert">
				  		$text
					</div>
				</div>
			</div>
		HTML;
		return $html;
	}
?>