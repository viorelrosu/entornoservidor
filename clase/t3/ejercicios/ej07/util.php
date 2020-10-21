<?php

	function pintarIconos($icon) {
		$html = '<div style="margin-bottom: 20px;">';
		$html .= '<img src="./img/Number-1-icon'.($icon!=1 ? '-disabled': '').'.png" width="40" />';
		$html .= '<img src="./img/Number-2-icon'.($icon!=2 ? '-disabled': '').'.png" width="40" />';
		$html .= '<img src="./img/Number-3-icon'.($icon!=3 ? '-disabled': '').'.png" width="40" />';
		$html .= '<img src="./img/fin'.($icon!=4 ? '-disabled': '').'.png" width="40" />';
		$html .= '</div>';
		return $html;
	}

	function pintarSelect($label, $nombre, $array, $seleccionados, $esMultiple=false){
		$html = '<div><field>';
		$html .= '<label>'.$label.'</label><br />';
	    $html .= $esMultiple ? "<select name=\"{$nombre}[]\" multiple=\"multiple\" >\n" : "<select name=\"$nombre\" >\n";

	    foreach($array as $value => $label) {
	        $selected = (in_array($value, $seleccionados)) ? 'selected="selected"' : '';
	        $html .= <<<HTML
					<option value="$value" $selected >$label</option>
					HTML;
	    }
	    $html .= "</select>\n";
	    $html .= '</field></div>';

	    return $html;
	}

	function pintarCheckboxes($nombre, $arrayValueLabel, $seleccionado){
	    $html = '<div><field>';
	    foreach($arrayValueLabel as $value => $label) {
	    	$html .= "<input type=\"checkbox\" name=\"$nombre\" value=\"$value\" id=\"id-$value\" ".($value==$seleccionado ? 'checked="checked"' : '')."/>\n";
	        $html .= "<label for=\"id-$value\">$label</label>";
	        $html .= "<br />";
	    }
	    $html .= '</field></div>';

	    return $html;
	}

	function pintarRadio($label, $nombre, $arrayValueLabel, $seleccionado=''){
	    $html = '<div><field>';
	    $html .= '<label>'.$label.'</label><br />';
	    foreach($arrayValueLabel as $value => $label) {
	        $html .= '<label for="id-'.$value.'">'.$label.'</label>';
	        $html .= '<input type="radio" id="id-'.$value.'" name="'.$nombre.'" value="'.$value.'" '. (($value==$seleccionado) ?  'checked="checked"' :'') .'/>';
	        $html .= '<br />';
	    }
	    $html .= '</field></div>';

	    return $html;
	}

	function getNacionalidadesString($nacionalidades) {
		$string = '';
		$textos = ['es'=>'Española','fr'=>'Francesa','it'=>'Italiana','pr'=>'Portuguesa'];
		foreach($nacionalidades as $nacion) {
			$string .= $textos[$nacion] . ', ';
		}
		return $string;
	}

?>