<?php
$texto = '';
echo "Introduce texto: ";
fscanf ( STDIN, "%s\n", $texto );

$nr=0;
echo "Introduce número: ";
fscanf ( STDIN, "%d\n", $nr );

for($i=1;$i<=$nr;$i++){
    echo "<h$i>$texto</h$i>\n";
}

for($j=$nr-1; $j>=1; $j--){
    echo "<h$j>$texto</h$j>\n";
}