<?php

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

	function getHtmlFooter($texto=''){
		$html = <<<HTML
			<footer>
				<div class="row">
					<div class="col-md-6 offset-md-3 text-muted">
						<hr />
						&copy; DAW2 Entorno Servidor - Ejercicio $texto | Viorel Rosu
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