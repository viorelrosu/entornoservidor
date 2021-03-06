<?php

	function mensaje($autor='V.Rosu'){
		$html = "Aplicación desarrollada por $autor";
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

	function getAficionesToStringByNombre($arrayBeans) {
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

			$html .= '<span class="badge badge-primary">'.$item->aficion->nombre.'</span> ';
		}

		return $html;
	}

	function arrayBeansToArrayIds($arraysBeans=[]){
        $arraysIds = [];
        if( is_array($arraysBeans) and count($arraysBeans)>0 ) {
        	foreach($arraysBeans as $bean) {
	            $arraysIds[] = $bean->id;
	        }
        }

        return $arraysIds;
    }

    function arrayAficionesToArrayIds($arraysBeans=[]){
        $arraysIds = [];
        if( is_array($arraysBeans) and count($arraysBeans)>0 ) {
        	foreach($arraysBeans as $bean) {
	            $arraysIds[] = $bean->aficion->id;
	        }
        }

        return $arraysIds;
    }

    function personaTieneAficion($persona,$aficion){
    	$sol = false;
    	foreach($persona->ownGustaList as $bean) {
            if ($bean->aficion->id == $aficion->id){
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

    /**
        @param rol a verificar. Puede ser "anonymous" o "usuario".
        @return true si el rol coincide con el del usuario actual y false
        en caso de que no coincide
    */
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