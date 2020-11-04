<?php

	$bdZodiaco = [
			'','Capricornio', 'Acuario', 'Piscis', 'Aries', 'Tauro', 'Géminis', 'Cáncer', 'Leo', 'Virgo', 'Libra', 'Escorpio', 'Sagitario'
	];

	$bdMeses = [
			'','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
	];

	function getArrayZodiaco($cotaInf, $cotaSup){
		global $bdZodiaco;
		$newArray = [];
		for ($i=$cotaInf; $i <= $cotaSup ; $i++) {
			$newArray[] = $bdZodiaco[$i];
		}
		return $newArray;
	}

	function getArrayMeses($cotaInf, $cotaSup){
		global $bdMeses;
		$newArray = [];
		for ($i=$cotaInf; $i <= $cotaSup ; $i++) {
			$newArray[] = $bdMeses[$i];
		}
		return $newArray;
	}

	function getHtmlLista($label='', $tipo, $listaValuesLabels, $name, $seleccionados=[], $esInline=false, $esMultiple=false, $evento=''){
		if($label != '') {
			$html = <<<HTML
				<div class="form-group">
					<label>$label</label><br />
			HTML;
		} else {
			$html = '';
		}
		switch ($tipo) {
			case 'radio':

			    foreach($listaValuesLabels as $value => $label) {
			    	$checked = (in_array($value, $seleccionados) ? 'checked="checked"' : '');
			    	$checkInline = $esInline ? ' form-check-inline' : '';
			    	$html .= '<div class="form-check '.$checkInline.'">';
			    	$html .= '<input class="form-check-input" type="radio" name="'.$name.'" id="exampleRadios1" onchange="'.$evento.';" value="'.$label.'" '. $checked .' >';
			    	$html .= '<label class="form-check-label" for="id-'.$label.'">'.$label.'</label>';
			    	$html .= '</div>';
			    }

				break;

			case 'select':
				$html .= $esMultiple ? "<select class=\"form-control\" name=\"{$name}[]\" multiple=\"multiple\" >\n" : "<select class=\"form-control\" name=\"$name\" >\n";

			    foreach($listaValuesLabels as $value => $label) {
			        $selected = (in_array($value, $seleccionados)) ? 'selected="selected"' : '';
			        $html .= <<<HTML
						<option value="$label" $selected >$label</option>
					HTML;
			    }
			    $html .= "</select>\n";

			    break;

			case 'checkbox':

			    foreach($listaValuesLabels as $value => $label) {
			    	$checked = (in_array($value, $seleccionados) ? 'checked="checked"' : '');
			    	$checkInline = $esInline ? ' form-check-inline' : '';
			    	$html .= '<div class="form-check '.$checkInline.'">';
			    	$html .= '<input class="form-check-input" type="checkbox" name="'.$name.'[]" id="id-'.$label.'" onchange="'.$evento.';" value="'.$label.'" '. $checked .' >';
			    	$html .= '<label class="form-check-label" for="id-'.$label.'">'.$label.'</label>';
			    	$html .= '</div>';
			    }

			default:
				# code...
				break;
		}

		if($label != '') {
			$html .= '</div>';
		}
		return $html;
	}

	function getHtmlCol($class='col', $innerHtml='', $newRow= false) {
		$html = '';
		if($newRow) {
			$html .= '<div class="row">';
		}
		$html .= '<div class="'.$class.'">';
		$html .= $innerHtml;
		$html .= '</div>';
		if($newRow) {
			$html .= '</div>';
		}
		return $html;
	}

	function getHtmlTitle($texto, $linea=true, $botton=false){
		$lineaHr = $linea ? '<hr />' : '';
		if($botton) {
			$html = <<<HTML
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="row">
							<div class="col-md-8"><h2 class="text-left">$texto</h2></div>
							<div class="col-md-4 text-right"><a href="index.php?logout=true" class="btn btn-info">Cerrar sesión</a></div>
						</div>
						$lineaHr
					</div>
				</div>
			HTML;
		} else {
			$html = <<<HTML
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<h2 class="text-center">$texto</h2>
						$lineaHr
					</div>
				</div>
			HTML;
		}

		return $html;
	}

	function getHtmlFooter($text=''){
		$html = <<<HTML
			<footer>
				<div class="row">
					<div class="col-md-6 offset-md-3 text-muted">
						<hr />
						&copy; DAW2 Entorno Servidor - Ejercicio $text | Viorel Rosu
					</div>
				</div>
			</footer>
		HTML;

		return $html;
	}

	function getHtmlAlert($tipo='info', $text, $id='idAlert') {
		$class = "alert-$tipo";
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="alert $class" role="alert" id="$id">
				  		$text
					</div>
				</div>
			</div>
		HTML;
		return $html;
	}

	function getHtmlBoton($text, $page="index.php",$class="btn btn-primary",$id) {
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<hr />
					<a href="$page" class="$class" id="$id">$text</a>
				</div>
			</div>
		HTML;

		return $html;
	}
?>