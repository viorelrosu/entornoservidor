<?php

	function getHtmlAlert($tipo='info', $text, $button=[]) {
		$class = "alert-$tipo";
		$htmlButton = '';
		if(sizeof($button)>0) {
			$htmlButton = '<br /><hr /><a href="'.$button[1].'" class="btn btn-secondary">'.$button[0].'</a>';
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


?>