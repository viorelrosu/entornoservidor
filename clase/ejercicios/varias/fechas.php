<?php
$actual = time();

echo date("H:i", $actual);
echo "<br/>";
echo date("d M Y H:i:s", $actual);
echo "<br/>";
echo strtotime("2014/10/04")."<br/>";
echo strtotime("04-10-2014")."<br/>";
echo strtotime("10/04/2014")."<br/>";
echo mktime(0,0,0,10,4,2014)."<br/>";

echo date('d M Y',strtotime("10/04/2014"))."<br/>";
echo date("d M Y H:i:s");

?>