<?php
include_once 'Persona.php';
require 'Persona.php';


$p = new Persona("Cristian","Martínez","55447788D");

//$p->hola();
$p->setNombre("Cristian");
$p->setApellido("Martínez");
$p->setDni("44552211D");
// $p->setDato(10);

$p2 = new Persona("Raquel","Ranchal","55441122S");
//echo $p->getNombre().' '.$p->getApellido().' '.$p->getDni().' '.$p->getDato();


$o = new Persona();
echo  $p;  //si no creo el tostring dará error;
echo "\n";
echo $p2;
echo "\n";
echo $o;
echo "\n";

echo  $o->miEstatico();
echo "\n";
echo Persona::miEstatico();


echo "\n";
echo get_class($p);

echo "\n";
$p->hola(8);
echo "\n";
$p->hola("hola");

?>