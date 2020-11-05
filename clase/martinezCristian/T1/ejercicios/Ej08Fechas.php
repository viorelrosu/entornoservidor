<?php

//corrección

echo "\n";

echo "introduce día: ";
fscanf(STDIN,"%d\n" ,$dia);

echo "introduce mes: ";
fscanf(STDIN,"%d\n" ,$mes);

echo "introduce año: ";
fscanf(STDIN,"%d\n" ,$anio);

$fHoy = time();
$fHastaFechaDada = mktime(0,0,0,$mes,$dia,$anio);

$solucion = ($fHoy - $fHastaFechaDada);

$segundosEnUnAño = 31536000;
$anios = (int)($solucion / $segundosEnUnAño);
$solucion = $solucion % $segundosEnUnAño;

$segundosEnUnMes = 2592000;
$meses = (int)($solucion / $segundosEnUnMes);
$solucion2 = "tienes $anios años,$meses meses";
$solucion = $solucion % $segundosEnUnAño;



echo $solucion2;




?>