<?php
$nombre = $_FILES['myFile']['name'];
//Ruta REAL en el disco. Debe tener “apache” permiso de escritura en ella
//Si no se dispone de ruta absoluta en el servidor, sólo de ruta relativa (en un hosting, por ejemplo), utilizar.
//$carpeta = ’./ruta/relativa/desde/el/document/root/del/proyecto’;
$carpeta = "./files/{$_POST['myFolder']}/";
//$carpeta = "./t2/ej17/files/{$_POST['myFolder']}/"; 
copy ( $_FILES['myFile']['tmp_name'], $carpeta . $nombre );
echo "<h1>El fichero $nombre se almacen&oacute; en $carpeta</h1>";
?>