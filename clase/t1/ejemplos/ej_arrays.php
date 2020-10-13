<?php

/*
$a = [10,20,30];

$a[105] = 500;
$a['nombre'] = 'ana';

/*for ($i=0; $i<sizeof($a); $i++){
    echo "($i){$a[$i]}";
    echo "\n";
}
*/

/*
foreach($a as $key=>$item){
    echo "($key) $item";
    echo "\n";
}

$datos = [ '1'=>10, 'a'=> 20, 76=>30];

echo in_array(10, $datos) ? "SI\n":"NO\n";
$claves = array_keys($datos);

print_r($claves);

$c='10';
var_dump($c);

$a=10;
echo "\$a vale $a \n";

$b=[10, 20];
echo "\$a[0] vale $b[0] \n";

$d=[10, [10,20]];
echo "\$d[1][1] vale {$d[1][1]} \n";

echo "<form>\n";
echo "<\tinput type=\"text\" name=\"dato\">\n";
echo "</form>\n";

echo <<<Formulario
<form>
    <input type="text" name="dato">
</form>
Formulario;

echo "\nend formulario";

$html =  <<<Formulario
<form>
    <input type="text" name="dato">
</form>
Formulario;

echo "\n".$html;
*/

$cadena = "123123131";
echo strlen($cadena)."\n";

echo substr($cadena, 3, 3) . "\n";

echo substr($cadena, -2)."\n"; //saca los ultimos 2 caracteres

$cadena = "     123..   ";

ltrim($cadena);
rtrim($cadena);
trim($cadena);

echo strlen(trim($cadena,'.'));

$cadena2 = "uno-dos-tres";
$a = explode('-', $cadena2);
print_r($a);
$nuevaCadena = implode(" ", $a);
echo $nuevaCadena."\n";
foreach($a as $item){
    echo $item . " ";
}

echo mb_strlen("uña");

str_replace('tonto','*****',$cadena);






