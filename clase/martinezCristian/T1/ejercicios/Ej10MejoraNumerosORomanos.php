<?php
$num = 0;
$sel = '';
$flag = false;
$arr = [
    "nombre" => [
        "uno",
        "dos",
        "tres",
        "cuatro",
        "cinco",
        "seis",
        "siete",
        "ocho",
        "nueve",
        "diez"
    ],
    "romano" => [
        "i",
        "ii",
        "iii",
        "iv",
        "v",
        "vi",
        "vii",
        "viii",
        "ix",
        "x"
    ]
];
do{
echo "Introduce un número entre 1 y 10: ";
fscanf(STDIN, "%d\n", $num);
} while ($num < 1 || $num >10);

do {
echo "Introduce el formato nombre/romano ";
fscanf(STDIN, "%s\n", $sel);

if ($sel == "nombre" || $sel == "romano"){
    $flag = true;
}
} while ($flag == false);

for ($i = 0; $i < $num; $i ++) {
    
    echo $arr[$sel][$i].' ';
}

?>