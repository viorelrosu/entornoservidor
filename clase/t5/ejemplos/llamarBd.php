<?php

require_once 'utilBD.php';

$db = conectarMySql();
echo "Conectado a la BD<br /><br />";

function insertarFila() {
	global $db;

	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Viorel';
	$apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : 'Rosu';

	echo "Insertando filas<br />";
	$sqlInsert = <<<SQL
		insert into personas(dni,nombre,apellidos,estatura) values (:dni,:nombre,:apellidos,:estatura)
	SQL;
	$resultado = $db->prepare($sqlInsert);
	$resultado->execute([':nombre' => $nombre,':apellidos'=>$apellidos, ':dni' => 'X12345678', ':estatura' => 170]);
	if($resultado) {
		echo "Fila Insertada <br/>";
		echo "lastID: ".$db->lastInsertId();
	} else {
		echo "Ha habido un error. <br/>";
	}

	//print_r($resultado) => PDOStatement Object ( [queryString] => insert into personas(dni,nombre,apellidos,estatura) values (:dni,:nombre,:apellidos,:estatura) );
	// echo $resultado['queryString'];
}

function borrarFila(){
	global $db;
	echo "Borrando filas<br />";
	$sqlDelete = <<<SQL
		delete from personas where dni = 1
	SQL;
	$db->exec($sqlDelete);
	echo "Fila Borrada<br />";
}

function actualizarFila(){
	global $db;
	echo "Actualizar filas<br />";
	$sqlUpdate = <<<SQL
		update personas SET dni = 'X1234567', nombre = 'Alberto', apellidos = 'Garay' where id = 2
	SQL;
	$db->exec($sqlUpdate);
	echo "Fila Actualizada<br />";
}

function consultarFilas(){
	global $db;
	$apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : 'Rosu';

	echo "Consultar filas<br />";
	$sqlSelect = <<<SQL
		select * from personas where apellidos like :apellidos
	SQL;
	$sentencia = $db->prepare($sqlSelect);
	$sentencia->execute([':apellidos' => 'Rosu']);

	$resultado = $sentencia->fetchAll();
	//print_r($resultado);
	//$resultado->rowCount(); para consultar el número de filas devueltas
	if(!$resultado) {
		echo 'Error al ejecutar query';
	} else {
		echo 'total filas: ' . count($resultado) . '<br />';
		foreach ($resultado as $key => $persona) {
			echo "dni:{$persona['dni']}, nombre:{$persona['nombre']}, apellido: {$persona['apellidos']}, estatura: {$persona['estatura']}   <br />";
		}

	}
}

insertarFila();
//insertarFila();
//insertarFila();
//borrarFila();
//actualizarFila();
//consultarFilas();


?>