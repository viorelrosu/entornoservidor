<?php

	$bdUsuarios = [
		'alfa'=>'palfa',
		'beta'=>'pbeta',
		'gamma'=>'pgamma',
	];

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

	function getHtmlFooter($text){
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