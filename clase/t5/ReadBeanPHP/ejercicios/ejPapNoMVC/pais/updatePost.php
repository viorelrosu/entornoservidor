<?php

require_once '../db/utilDBPais.php';
require_once '../db/util.php';

$nombreP = isset($_POST['nombreP']) ? $_POST['nombreP'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

$html = '';
if($nombreP != null and $id != null) {
	if(actualizarPais($id, $nombreP)) {
		header('Location: updatePostOK.php?nombreP='.$nombreP);
	} else {
		$html = "El nombre del País no se puede repetir.";
	};
} else {
	if($nombreP == null) {
		$html = "El nombre del País no puede ser null.";
	}
}
?>