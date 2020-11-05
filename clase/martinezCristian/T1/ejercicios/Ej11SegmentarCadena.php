<?php

$arrZona = ["Nombre: ","Apellido: ","Teléfono: "];
$cadena = "Alberto:Garay:666555444//Cristian:Martinez:666999888";
$contador = 0;
$segmento1 = explode("//", $cadena);


// for ($i = 0; $i < sizeof($segmento1); $i++){
        
//      //echo $segmento1[$i]."\n";
//      $auxCadena = $segmento1[$i];
     
//      $segmento2 = explode(":", $auxCadena);
     
//      for ($j = 0; $j < sizeof($segmento2); $j++){
//          echo $arrZona[$j].$segmento2[$j]."\n";
         
//      }
//     echo "==================\n";
    
    
// }
    
    foreach ($segmento1 as $persona){
        $auxArr = explode(":", $persona);
        foreach ($auxArr as $datos){
            echo $arrZona[$contador++].$datos."\n";
            if ($contador > 2){
                $contador = 0;
            }
        }
        echo "=================\n";
    }


?>