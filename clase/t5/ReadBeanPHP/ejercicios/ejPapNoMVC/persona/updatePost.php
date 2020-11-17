<?php

require_once '../db/utilDBPersona.php';
require_once '../db/util.php';

$nombreP = isset($_POST['nombreP']) ? $_POST['nombreP'] : null;
$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
$idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

$html = '';
if($nombreP != null and $id != null and $dni != null and $idPais != null) {
	if(actualizar($id, $nombreP, $dni, $idPais)) {
		header('Location: updatePostOK.php?nombreP='.$nombreP);
	} else {
		$html = "El DNI de la Persona no se puede repetir.";
	};
} else {
	if($nombreP == null) {
		$html = "El nombre de la Persona no puede ser null.";
	}
	if($dni == null) {
		$html = "El DNI de la Persona no puede ser null.";
	}
	if($idPais == null) {
		$html = "El País de la Persona no puede ser null.";
	}
}
?>