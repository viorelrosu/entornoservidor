<?php
$nombre = $_FILES['fichero']['name'];
$carpDestino = "./files/";

copy($_FILES['fichero']['tmp_name'],$carpDestino.$_POST['destino']."/".$nombre);


echo "El fichero se llama $nombre <br> y se almacenará en {$_POST['destino']}: ";
echo " $carpDestino".$_POST['destino']."/".$nombre;

?>