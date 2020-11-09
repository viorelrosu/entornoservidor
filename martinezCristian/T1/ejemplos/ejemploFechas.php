<?php
    


echo time()."\n";  //milisegundos transcurridos UNIX

echo date("(d/M/Y) H:i:s ")."\n"; //d = dia del mes  M = mes en letras Y= año  H = hora del dia  i = minutos  s = segundos

echo strtotime("1988/08/20")."\n";  //saber los milisegundos de una fecha exacta

echo mktime(0,0,0,8,20,1988)."\n";

echo setlocale($category, $locale)

?>