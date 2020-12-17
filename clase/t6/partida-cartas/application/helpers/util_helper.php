<?php

	function mensaje($autor='Viorel Rosu'){
		$html = "Aplicación desarrollada por $autor";
		return $html;
	}

	function getPuntuacionTotal($jugador){
        $total = 0;
        foreach($jugador->ownPuntuacionList as $puntuacion) {
            $total += $puntuacion->puntuacion;
        }
        return $total;
    }

    function puntuacionJugadorBaza($jugador,$baza){
         return R::findOne('puntuacion','jugador_id=? and baza_id=?', [$jugador->id,$baza->id]);
    }

    function esPuntuacionMasBaja($listPuntuaciones, $puntuacionToCheck){
        $esPuntuacionMasBaja = true;
        foreach($listPuntuaciones as $puntuacion) {
            if($puntuacion->id != $puntuacionToCheck->id ) {
                if($puntuacion->puntuacion < $puntuacionToCheck->puntuacion){
                    $esPuntuacionMasBaja = false;
                }
            }
        }
        return $esPuntuacionMasBaja;
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