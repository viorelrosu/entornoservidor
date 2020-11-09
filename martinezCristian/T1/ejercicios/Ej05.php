<?php
$barajaAr = [
    "as",
    "dos",
    "tres",
    "cuatro",
    "cinco",
    "seis",
    "siete",
    "sota",
    "caballo",
    "rey"
];
$cont = 0;
$n = 0;

echo "Introduce n: ";
fscanf(STDIN, "%d\n", $n);

for ($i = 0; $i < $n; $i ++) {

    if ($cont > 9) {
        $cont = 0;
    }

    echo $barajaAr[$cont] . ' ';
    
    $cont ++;
}

?>