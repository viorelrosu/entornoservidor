<?php

require_once '../lib/rb.php';

R::setup('mysql:host=localhost;dbname=daw2_servidor_vio','root','');

/* create */
/*
$p = R::dispense('persona');
$p->nombre = 'Ana';
$p->apellido = 'Sanchez';
$p->colorOjos = 'azul';
R::store($p);
*/

/* consultar la base de datos */
/*
$p = R::load('persona',2);

if($p->id != 0) {
	echo "<h4>Id: {$p->id}, Nombre: {$p->nombre}, Apellido: {$p->apellido}</h4>";
} else {
	echo 'No existe';
}


$apellido = isset($_GET['apellido'])?$_GET['apellido']:'';
$apellido = "%$apellido%";
//$personas = R::findAll('persona');
$personas = R::find('persona',"apellido like :ape",[':ape'=>$apellido]);
//print_r($personas);
foreach($personas as $p) {
	echo "<h4>Id: {$p->id}, Nombre: {$p->nombre}, Apellido: {$p->apellido}</h4>";
}
*/

$datos = R::getAll('select nombre, count(*) as num from persona group by nombre');
foreach ($datos as $key => $d) {
	echo "<h4>Nombre: {$d['nombre']}, Num: {$d['num']}</h4>";
}


/* actualizar */
/*
$p->nombre = 'Jose';
R::store($p);
*/

/* borrar */
/*
$p = R::load('persona',2);
R::trash($p);
*/

echo 'TODO OK';


?>