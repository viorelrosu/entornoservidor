<?php
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )  == 'xmlhttprequest'  : false ;
if($isAjax) {
	require_once 'util.php';
	$filterBy = isset($_POST['filtro']) ? $_POST['filtro'] : false;
	$text = isset($_POST['text']) ? $_POST['text'] : false;
	$htmlTrs='';
	if($text and $filterBy) {
		$num=0; $sinResultados = true;
		foreach($bdEmpleados as $key => $empleado) {
			$num++;
			$isValid = isEmpleadoFilter($key, $filterBy, $text);
			if($isValid) {
				$sinResultados = false;
				$htmlTrs .= <<<HTML
					<tr>
				      <th scope="row">$num</th>
				      <td>{$empleado[0]}</td>
				      <td>{$empleado[1]}</td>
				      <td>{$empleado[2]}</td>
				    </tr>
				HTML;
			}
		}

		if($sinResultados) {
			$htmlTrs .= 'sinResultados';
		}
	} else {
		$htmlTrs .= <<<HTML
			<tr>
		      <td colspan="4">Introduce correctamente los datos de búsqueda</td>
		    </tr>
		HTML;
	}

	echo $htmlTrs;

} else {
    echo "Solo ejecuciones Ajax";
}

?>