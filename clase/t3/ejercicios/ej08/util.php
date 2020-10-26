<?php

	function inicializarPalabraOculta() {
		$palabras = [
				'Avión',
				'Cañería',
				'Ungüento',
				'Idiazábal'
		];
		return ($palabras [rand ( 0, sizeof ( $palabras ) - 1 )]);
	}

	function inicializarPalabraEnCurso($numCaracteres) {
		$sol = '';
		for($i = 0; $i < $numCaracteres; $i ++) {
			$sol .= '-';
		}
		return $sol;
	}

	function actualizarPalabraEnCurso($pOrig, $pCurso, $letra) {
		$letra = normaliza ( $letra );
		$sol = '';
		for($i = 0; $i < mb_strlen ( $pCurso ); $i ++) {
			$letraActual = mb_substr ( $pCurso, $i, 1 );
			$sol .= ($letraActual != '-' ? $letraActual : ($letra == normaliza ( mb_substr ( $pOrig, $i, 1 ) ) ? mb_substr ( $pOrig, $i, 1 ) : '-'));
		}
		return $sol;
	}

	function normaliza($letra) {
		return mb_strtolower ( eliminar_tildes ( $letra ) ) ;
	}

	function existeLetra($letra, $palabra) {
		$letra = normaliza ( $letra );
		$sol = false;
		for($i = 0; (! $sol) && $i < mb_strlen ( $palabra ); $i ++) {
			$letraActual = mb_substr ( $palabra, $i, 1 );
			$sol = ($letra == normaliza ( $letraActual ));
		}
		return $sol;
	}

	function eliminar_tildes($cadena){

	    //Ahora reemplazamos las letras
	    $cadena = str_replace(
	        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
	        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
	        $cadena
	    );

	    $cadena = str_replace(
	        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
	        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
	        $cadena );

	    $cadena = str_replace(
	        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
	        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
	        $cadena );

	    $cadena = str_replace(
	        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
	        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
	        $cadena );

	    $cadena = str_replace(
	        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
	        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
	        $cadena );

	    $cadena = str_replace(
	        array('ñ', 'Ñ', 'ç', 'Ç'),
	        array('n', 'N', 'c', 'C'),
	        $cadena
	    );

	    return $cadena;
	}

	function pintarLetras($palabra){
		$salida = '';
		$EOL = PHP_EOL;
		$salida .= '<table border="1" style="margin: 20px 0px;">' . $EOL;
		$salida .= '<tr>' . $EOL;
		for($i = 0; $i < mb_strlen ( $palabra ); $i ++) {
			$letra = mb_substr ( $palabra, $i, 1 );
			$salida .= '<td><input align="center" type="text" size="1" readonly="readonly" value="';
			$salida .= $letra;
			$salida .= '" style="padding: 10px; font-size: 20px; "/></td>' . $EOL;
		}
		$salida .= '</tr>' . $EOL;
		$salida .= '</table>' . $EOL;
		return $salida;
	}

?>