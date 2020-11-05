<?php

require_once 'Padre.php';
require_once 'Hijo.php';

$p = new Padre();
$h = new Hijo();

$p->hola();
echo "\n";
$h->hola();


echo "\n";

$p->hablar();
echo "\n";
$h->hablar();

echo "\n";
$h->botellon();