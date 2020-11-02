<?php

	$bdEtiquetas=[
		"ES"=>[
			"usuario"=>"Usuario",
			"pass"=>"Contraseña",
			"boton"=>"Iniciar sesión",
			"recordar"=>"Recordar",
			"alert_inicio" => "Introduce tus datos de sesión",
			"title" => "Ejercicio 04 - Ajax",
			"invalid" => "Lo siento, los datos no son correctos. Intentalo de nuevo.",
			"bienvenido" => "Bienvenido " . $_SESSION['_activo'],
			"volver" => "Volver",
			"numero"=>"Introduce un número de 1 a 10",
			"salir"=>"Cerrar sessión",
			"alert_acierto" => "Enhorabuena. Has acertado.",
			"alert_corto" => "Lo siento. Te has quedado corto.",
			"alert_pasado" => "Lo siento. Te has pasado.",
			"my_number" => "Mi número es: ",
			"your_number" => "Tu número es: "
		],
		"EN"=>[
			"usuario"=>"User",
			"pass"=>"Password",
			"boton"=>"Log in",
			"recordar"=>"Remember",
			"alert_inicio" => "Introduce your credentials",
			"title" => "Exercise 04 - Ajax",
			"invalid" => "Sorry, the data is not correct. Try again.",
			"bienvenido" => "Welcome ".$_SESSION['_activo'],
			"volver" => "Go back",
			"numero"=>"Introduce a number between 1 and 10",
			"salir"=>"Logout",
			"alert_acierto" => "Congrats. You got it.",
			"alert_corto" => "Sorry. Your number is lower.",
			"alert_pasado" => "Sorry. Your number is higher.",
			"my_number" => "My number is: ",
			"your_number" => "Your number is: "
		],
	];

	$bdUsuarios = [
		'alfa'=>'palfa',
		'beta'=>'pbeta',
		'gamma'=>'pgamma',
	];

	function getHtmlTitle($texto, $linea=true, $id="idTitle"){
		$lineaHr = $linea ? '<hr />' : '';
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h2 class="text-center" id="$id">$texto</h2>
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
						&copy; DAW2 Entorno Servidor - Ejercicio 04 - Ajax | Viorel Rosu
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

	function getHtmlRadioPaises($seleccionado) {
		global $bdEtiquetas;
		$paises = array_keys($bdEtiquetas);
		$htmlRadioIdiomas = '';
		foreach ( $paises as $v ) {
			$htmlRadioIdiomas .= "<span><img src=\"img/$v.png\" width=\"35\"></span>";
			$htmlRadioIdiomas .= "<input type=\"radio\" name=\"idioma\" id=\"id$v\" value=\"$v\"" . ($v == $seleccionado ? 'checked="checked"' : '') . ' onChange="peticionIdiomasAjax()">' . PHP_EOL;
		}

		$html = <<<HTML
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<hr />
				<form id="idFCambioIdioma" method="get">
				$htmlRadioIdiomas
				</form>
				<hr />
			</div>
		</div>
		HTML;

		return $html;

	}

	function getHtmlBoton($tipo, $page="index.php",$class="btn btn-primary",$id) {
		global $bdEtiquetas;
		$html = <<<HTML
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<hr />
					<a href="$page" class="$class" id="$id">{$bdEtiquetas[$_SESSION['_idioma']][$tipo]}</a>
				</div>
			</div>
		HTML;

		return $html;
	}
?>