<?php
session_start();
require_once 'util.php';

$signo = isset($_GET['signo']) ? $_GET['signo'] : false;
$mes = isset($_GET['mes']) ? $_GET['mes'] : false;

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Examen - Ejercicio 01');

echo getHtmlAlert('success','Gracias');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
Signo escogido: $signo<br />
Mes escogido: $mes
</div>
</div>
HTML;


echo getHtmlFooter('01');

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>