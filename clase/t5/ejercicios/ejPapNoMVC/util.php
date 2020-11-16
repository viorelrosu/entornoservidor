<?php

	require_once '../../rb.php';

	R::setup('mysql:host=localhost;dbname=daw2_servidor_vio', 'root', 'root');

	$pais = R::dispense('pais');


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