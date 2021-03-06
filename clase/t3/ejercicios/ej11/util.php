<?php

	require_once 'Carta.php';
	function inicializarBaraja() {
	    $mazo = [];
	    $palos = ['oros','copas','espadas','bastos'];
	    $figuras = ['as','dos','tres','cuatro','cinco','seis','siete','sota','caballo','rey'];

	    foreach ($palos as $palo) {
	        foreach ($figuras as $v => $figura) {
	            $nombre = $figura.' de '.$palo;
	            $valor = ($v<7?$v+1:0.5);
	            $img = 'img/'.substr($palo,0,1).($v+1).'.jpg';
	            $carta = new Carta($nombre,$valor,$img);
	            $mazo[] = $carta;
	        }
	    }

	    return $mazo;
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
						&copy; DAW2 Entorno Servidor - Ejercicio ?? | Viorel Rosu
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

	function getHtmlLista($label='', $tipo, $listaValuesLabels, $name, $seleccionados=[], $esInline=false, $esMultiple=false, $evento=''){
		if($label != '') {
			$html = <<<HTML
				<div class="form-group">
					<label class="font-weight-bold">$label</label><br />
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

	function getHtmlBoton($text='Volver', $page="index.php", $class="btn btn-primary", $id='idBoton') {
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

	function getHtmlStart( $isScriptJs=false, $title='Siete y Media' ) {
		$scripts = $isScriptJs ? '<script type="text/javascript" src="scripts.js"></script>':'';
		$html = <<<HTML
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>$title</title>
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
				$scripts
			</head>
			<body>
				<div class="container pt-4">
		HTML;

		return $html;
	}


	function getHtmlEnd(){

		$html = <<<HTML
				</div>
			</body>
		HTML;

		return $html;

	}
?>