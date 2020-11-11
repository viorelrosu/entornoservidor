<?php

require_once 'util.php';

$filasInsertadas = consultar();
?>

<form action="insertarProducto.php" method="post" >
	<label>Nombre del producto</label><br />
	<input type="text" name="nombre" value="" /><br /><br />
	<label>Precio del producto</label><br />
	<input type="text" name="precio" value="" /><br /><br />
	<input type="submit" value="Guardar" />
</form>

<?php
	foreach($filasInsertadas as $key => $fila) {
		echo "Producto: {$fila['nombre']}  => {$fila['precio']} euros <br />";
	}
?>