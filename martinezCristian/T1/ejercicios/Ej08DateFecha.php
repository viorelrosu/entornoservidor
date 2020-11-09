<?php
$msAnioReales = 31536000;
// $msAnio = 31104000;    $msAnioReales = 31536000;
$msMes = 2592000;
$msDias = 86400;
$msHoras = 3600;
$msMin = 60;
$msSeg = 1;

$a = time();
$b = mktime(0, 0, 0, 12, 29, 1989);
$c = ($a - $b);

// echo $a."\n".$b."\n".$c."\n";

$restoMes = ($c % $msAnioReales);
$restoDia = ($restoMes % $msMes);
$restoHora = ($restoDia % $msDias);
$restoMin = ($restoHora % $msHoras);
$restoSeg = ($restoMin % $msMin);

echo "han transcurrido: " . floor($c / $msAnioReales) . " Años, " . floor($restoMes / $msMes) . " meses, " . floor($restoDia / $msDias) . " días, " . floor($restoHora / $msHoras) . " horas, " . floor($restoMin / $msMin) . " minutos, " . floor($restoSeg / $msSeg) . " segundos";

?>