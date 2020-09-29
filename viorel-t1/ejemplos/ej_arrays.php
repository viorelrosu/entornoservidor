<?php
$a = [10,20,30];

$a[105] = 500;
$a['nombre'] = 'ana';

/*for ($i=0; $i<sizeof($a); $i++){
    echo "($i){$a[$i]}";
    echo "\n";
}
*/

foreach($a as $key=>$item){
    echo "($key) $item";
    echo "\n";
}