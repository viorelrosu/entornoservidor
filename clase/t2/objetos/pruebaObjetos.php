<?php 
require_once('Persona.php');
require_once('Padre.php');
require_once('Hijo.php');
require_once('Animal.php');
require_once('Leon.php');

$persona = new Persona();

$persona->hola();
$persona->setDato('esto es un dato');
echo $persona->getDato(); //es un atributo public

$persona->setNombre('Viorel');
$persona->setApellidos('Rosu');


echo $persona;

$p2 = new Persona();
$p2->setNombre('Alberto');
$p2->setApellidos('Garay');

echo $p2;

$p3 = new Persona('Alberto','Garay');
echo $p3;

$p3::est1();
echo get_class($p3);

$padre = new Padre();
$hijo = new Hijo();
$hijo->hablar();
$hijo->andar();
$hijo->botellon();

$leon = new Leon();
$leon->respirar();




?>