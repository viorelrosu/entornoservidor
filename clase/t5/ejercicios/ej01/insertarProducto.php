<?php
require_once 'util.php';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
$precio = isset($_POST['precio']) ? $_POST['precio'] : false;

if($nombre and $precio) {
	insertar([$nombre,$precio]);
}


?>