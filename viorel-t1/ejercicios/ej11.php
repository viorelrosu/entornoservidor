<?php
$cadena = "Alberto:Garay:913334555//Ana:Sanchez:912345678";

$personas = explode("//", $cadena);
foreach($personas as $persona){
    $datosPersona = explode(":", $persona);
   // foreach($datosPersona as $dato){
        echo <<<Persona
            Nombre: $datosPersona[0]
            Apellidos: $datosPersona[1]
            Teléfono: $datosPersona[2]
            ======
        Persona;
    // }
    echo "\n";
}