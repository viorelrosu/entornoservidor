<?php
$nombre = $_FILES['myFile']['name'];

$carpeta = "/clase/t2/ej17/files/{$_POST['myFolder']}/"; //Ruta REAL en el disco. Debe tener “apache” permiso de escritura en ella
copy ( $_FILES['myFile']['tmp_name'], $carpeta . $nombre );
echo "<h1>El fichero $nombre se almacen&oacute; en $carpeta</h1>";
?>