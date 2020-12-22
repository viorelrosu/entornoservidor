<?php

	function mensaje($autor='Viorel Rosu'){
		$html = "Aplicación desarrollada por $autor";
		return $html;
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

    function getUserSession(){
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['_usuario']) ? $_SESSION['_usuario'] : null;
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

    function prgBack($tipo='',$mensaje='',$link='mensaje') {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['_tipo'] = $tipo;
        $_SESSION['_link'] = $link;
        $_SESSION['_mensaje'] = $mensaje;

        header('Location:'. base_url().$link);
    }

    function getMsgSession(){
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $tipo = isset($_SESSION['_tipo']) ? $_SESSION['_tipo'] : null;
        $mensaje = isset($_SESSION['_mensaje']) ? $_SESSION['_mensaje'] : null;
        $link = isset($_SESSION['_link']) ? $_SESSION['_link'] : null;

        unset($_SESSION['_tipo']);
        unset($_SESSION['_mensaje']);
        unset($_SESSION['_link']);

        if( $tipo != null and $mensaje != null and $link != null) {
            $datos['tipo'] = $tipo;
            $datos['mensaje'] = $mensaje;
            $datos['link'] = $link;
        } else {
            $datos = null;
        }

        return $datos;
    }

    function getMsg($msg) {
        $html = '';
        if ($msg != null):
            $html = '<div class="alert alert-'.$msg['tipo'].'"> '. $msg['mensaje'] . '</div>';
        endif;
        return $html;
    }

    function checkPremio($numero,$participacion){
        $premios = R::findAll('premio');
        $isPremio = false; $tipo = ''; $multiplicador = 0;
        foreach($premios as $premio){
            if($numero == $premio->numero) {
                $isPremio = true;
                $tipo = $premio->tipo;
                $multiplicador = $premio->tipo->multiplicador;
            }
        }

        $html = '';
        if($isPremio) {
            $html .= '<span class="badge badge-success">' . $tipo->nombre . '<br />';
            $html .= number_format(($participacion * $multiplicador), 2) . ' € </span>';
        } else {
            $html .= '<span class="badge badge-danger">No premiado</span>';
        }

        return $html;

    }

    function isRolValid($rol) {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $isValid = false;
        if($rol == 'usuario' && isset($_SESSION['_usuario']) && ($_SESSION['_usuario']->rol->nombre == 'usuario') ){
            $isValid = true;
        }
        if($rol == 'admin' && isset($_SESSION['_usuario']) && ($_SESSION['_usuario']->rol->nombre == 'admin')){
            $isValid = true;
        }
        if($rol == 'anonymous'){
            $isValid = true;
        }
        return $isValid;
    }

?>