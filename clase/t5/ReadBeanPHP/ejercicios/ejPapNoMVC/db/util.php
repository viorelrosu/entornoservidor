<?php

	function getHtmlAlert($tipo='info', $text, $button=[]) {
		$class = "alert-$tipo";
		$htmlButton = '';
		if(sizeof($button)>0) {
			$classButton = array_key_exists(2, $button) ? $button[2] : 'btn-secondary';
			$htmlButton = '<br /><hr /><a href="'.$button[1].'" class="btn '.$classButton.'">'.$button[0].'</a>';
		}
		$html = <<<HTML
			<div class="row">
				<div class="col-8 offset-1">
					<div class="alert $class" role="alert">
				  		$text
				  		$htmlButton
					</div>
				</div>
			</div>
		HTML;
		return $html;
	}
	function getBeansToStringByNombre($arrayBeans) {
		$html = ''; $i = 0;
		foreach($arrayBeans as $item) {
			$i++;
			//if( $i ==  array_key_last($arrayBeans) ) {
			//if( $i ==  sizeof($arrayBeans) ) {
			// if( $i ==  count($arrayBeans) ) {
			// 	$html .= $item->nombre;
			// } else {
			// 	$html .= $item->nombre . ', ';
			// }

			$html .= '<span class="badge badge-primary">'.$item->nombre.'</span> ';
		}

		return $html;
	}

	function getBeansToStringByAficionNombre($arrayBeans) {
		$html = '';
		foreach($arrayBeans as $item) {
			$html .= '<span class="badge badge-primary">'.$item->aficion->nombre.'</span> ';
		}

		return $html;
	}




?>