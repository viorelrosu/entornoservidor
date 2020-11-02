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

	function getHtmlFooter($num){
		$html = <<<HTML
			<footer>
				<div class="row">
					<div class="col-md-6 offset-md-3 text-muted">
						<hr />
						&copy; DAW2 Entorno Servidor - Ejercicio $num | Viorel Rosu
					</div>
				</div>
			</footer>
		HTML;

		return $html;
	}

	function getHtmlAlert($tipo='info', $text, $id="idAlert") {
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

	function getHtmlDiccionario($pendientes=false){
		$diccionario = isset($_SESSION['diccionario']) ? $_SESSION['diccionario'] : [];

		if($pendientes) {
			$diccionario = isset($_SESSION['pendientes']) ? $_SESSION['pendientes'] : [];
		}

		$htmlTrs = '';
		$num=0;
		if(isset($diccionario) and !empty($diccionario) ) {
			foreach($diccionario as $palabra ) {
				$num++;
				$htmlTrs .= <<<HTML
					<tr>
				      <th scope="row">$num</th>
				      <td>{$palabra['es']}</td>
				      <td>{$palabra['en']}</td>
				      <td>{$palabra['fr']}</td>
				    </tr>
				HTML;
			}
		} else {
			$mensaje = ($pendientes ? 'No hay palabras pendientes.' : 'No hay palabras en el diccionario');
			$htmlTrs .= <<<HTML
				<tr>
			      <td colspan="4">$mensaje</td>
			    </tr>
			HTML;
		}

		$html = <<<HTML
			<div class="row mt-5">
				<div class="col-md-6 offset-md-3">
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th>#</th>
					      <th>Español</th>
					      <th>Inglés</th>
					      <th>Francés</th>
					    </tr>
					  </thead>
					  <tbody>
					  	$htmlTrs
					  </tbody>
					</table>
				</div>
			</div>
		HTML;

		return $html;
	}

?>