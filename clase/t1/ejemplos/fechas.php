<?php
$actual = time();

echo date("H:i", $actual);
echo "\n";
echo date("d M Y H:i:s", $actual);
echo "\n";
echo strtotime("2014/10/04")."\n";
echo strtotime("04-10-2014")."\n";
echo strtotime("10/04/2014")."\n";

echo mktime(0,0,0,10,4,2014)."\n";