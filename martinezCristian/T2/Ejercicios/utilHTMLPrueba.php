<?php

function resaltar($texto) {
    
    $html = "<h1> $texto </h1>";
    return $html;
}

function generarRadio($nombre,$arrayValueLabel, $seleccionado){
    
    $html = '';
    
    foreach ($arrayValueLabel as $value => $label){
        $selected = $value == $seleccionado? 'checked="checked"' : '';
        $html .= "<label for=\"$value\">$label</label>\n";
        $html .= "<input type=\"radio\" id =\"$value\" name =\"$nombre\" value =\"$value\" $selected <br>\n ";
        $html .= "<br/>\n\n";
        
    }
    
    return $html;
    
}
function generarCheckBox ($nombre, $arrayValueLabel){
    $html ='';
    
    foreach ($arrayValueLabel as $value => $label){
       
        $html .= "<label for=\"$value\">$label</label>";
        $html .= "<input type=\"checkbox\" id=\"$value\" name=\"$nombre\[]\" value=\"$value\" <br/>\n";
        $html .= "<br/>\n\n";
        
    }
    
    
    return $html;
}

function generarMejorCheckBox ($nombre, $arrayValueLabel, $seleccionados){
    $html ='';
    
    foreach ($arrayValueLabel as $value => $label){
        $selected = in_array($value, $seleccionados) ? 'checked="checked"' : '';
        $html .= "<label for=\"$value\">$label</label>";
        $html .= "<input type=\"checkbox\" id=\"$value\" name=\"$nombre\[]\" value=\"$value\" $selected <br/>\n";
        $html .= "<br/>\n\n";
        
    }
    
    
    return $html;
}

function pintarSelect ($nombre, $arrayValueLabel, $seleccionados){
    
    $html = '';
    
    
    
}





?>