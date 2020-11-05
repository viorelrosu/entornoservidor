<?php
$check = true;

$nombre = '';
$apellido = '';
$telefono = '';

$cadena = "";
$form = [
    "Nombre:",
    "Apellido:",
    "Telefono:"
];
$cont = 0;

while ($check) {

    echo "Introduce el nombre:";
    fscanf(STDIN, "%s\n", $nombre);
    echo "Introduce el apellido:";
    fscanf(STDIN, "%s\n", $apellido);
    echo "Introduce el telefono:";
    fscanf(STDIN, "%s\n", $telefono);

    $cadena .= "$nombre:$apellido:$telefono";

    echo "quieres seguir introduciendo nombres (s/n)?";
    fscanf(STDIN, "%s\n", $check);
    if ($check == "n") {
        $check = false;
    } else {
        $cadena .= "//";
    }
}


$personas = explode("//", $cadena);
foreach ($personas as $persona) {
    echo "\n";
    $datosPersona = explode(":", $persona);
    foreach ($datosPersona as $dato) {
        
        echo $form[$cont] . $dato . "\n";
        $cont ++;
        if ($cont > 2) {
            $cont = 0;
        }
        
    }
    echo "===================\n";
}

?>