<?php
echo "Introduce día: ";
fscanf(STDIN,"%d\n",$dia);

echo "Introduce mes: ";
fscanf(STDIN,"%d\n",$mes);

echo "Introduce año: ";
fscanf(STDIN,"%d\n",$anyo);

$segHastaHoy = time();
$segHastaFecha = strtotime("$anyo/$mes/$dia"); //mktime(0,0,0,$mes, $dia, $anyo);
$segTransc = $segHastaHoy - $segHastaFecha;

$segEnUnAnyo = 31536000;
$anios = (int)($segTransc/$segEnUnAnyo);
$resto = $segTransc % $segEnUnAnyo;

$segEnUnMes = 2592000;
$meses = (int) ($resto/$segEnUnMes);
$resto = $resto % $segEnUnMes;

$segEnUnDia = 86400;
$dias = (int) ($resto/$segEnUnDia);
$resto = $resto % $segEnUnDia;

$segEnUnaHora = 3600;
$horas = (int) ($resto/$segEnUnaHora);
$resto = $resto % $segEnUnaHora;

$segEnUnMin = 60;
$minutos = (int) ($resto/$segEnUnMin);
$resto = $resto % $segEnUnMin;

echo "Han transcurrido $anios años, $meses meses, $dias dias, $horas horas, $minutos minutos y $resto segundos desde $dia/$mes/$anyo";