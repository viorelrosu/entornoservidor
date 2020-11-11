<?php

	require_once 'utilBD.php';

	$db = conectarMySql();

	function insertar($datos){
		global $db;
		$sqlInsert = <<<SQL
		insert into productos(nombre,precio) values (:nombre,:precio)
		SQL;
		$resultado = $db->prepare($sqlInsert);
		$resultado->bindParam(':nombre', $datos[0]);
		$resultado->bindParam(':precio', $datos[1]);
		$resultado->execute();
		if($resultado) {
			header('Location: productoOK.php?nombre='.$datos[0] . '&precio='.$datos[1]);
		} else {
			header('Location: index.php?e=e');
		}

	}


	function consultar(){
		global $db;

		$sqlSelect = <<<SQL
			select * from productos
		SQL;
		$sentencia = $db->prepare($sqlSelect);
		$sentencia->execute();

		$resultado = $sentencia->fetchAll();
		//print_r($resultado);
		//$resultado->rowCount(); para consultar el número de filas devueltas
		return $resultado;
	}

?>