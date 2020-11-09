<?php

function resaltar($cadena) {
    $cadena = "<h1>$cadena</h1>";
    return $cadena;
}


function radio($nombre,$arrayValueLabel,$seleccionado) {
    $html = "";
    foreach ($arrayValueLabel as $key => $valor){
        $recogido = $seleccionado == $key ? "checked=\"checked\"":"";
        $html.= "<label for=\"$key\">$key</label><input type=\"radio\" name=\"$nombre\" id=\"$key\" value=\"$valor\" $recogido/><br>";
    }
    
    return $html;
}

function checkbox($nombre,$arrayLabelValue,$seleccionado) {
    $html = "";

    foreach ($arrayLabelValue as $key => $valor){
        
        $recogido = in_array($key, $seleccionado) ? "checked=\"checked\"":"";
        
        $html .= "<label for=\"$key\">$valor</label><input type=\"checkbox\" name=\"$nombre\[\]\" id=\"$key\" value=\"$key\" $recogido />";
        
    }
    
    $html .= "<br>";
    
    return $html;
}


?>