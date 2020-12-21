<?php

	function mensaje($autor='Viorel Rosu'){
		$html = "Aplicación desarrollada por $autor";
		return $html;
	}


    function empleadoTieneLenguaje($empleado,$lenguaje){
    	$sol = false;
    	foreach($empleado->ownDominaList as $bean) {
            if ($bean->lenguaje->id == $lenguaje->id){
            	$sol = true;
            };
        }

    	return $sol;
    }

    function volver($link,$text='Volver') {
    	$url = base_url().$link;
    	$html = '<div class="row mt-5">';
    	$html .= '<div class="col text-right">';
    	$html .= '<hr/>';
    	$html .= '<a href="'.$url.'" class="btn btn-secondary">'.$text.'</a>';
    	$html .= '</div>';
    	$html .= '</div>';

    	return $html;
    }

    function prg($tipo='',$mensaje='',$link='') {
    	if(session_status() == PHP_SESSION_NONE) {
    		session_start();
    	}
    	$_SESSION['_tipo'] = $tipo;
    	$_SESSION['_link'] = $link;
    	$_SESSION['_mensaje'] = $mensaje;

    	header('Location:'. base_url().'mensaje');
    }

?>