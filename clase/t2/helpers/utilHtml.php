<?php

function genInputText($name, $value){
    return '<input name="$name" value="$value" id="$name" />';
    
}

function resaltar($texto){
    return "<h1>$texto</h1>";
}

function pintarRadio($nombre, $arrayValueLabel, $seleccionado){
    $html = '';
    foreach($arrayValueLabel as $value => $label) {
        $html .= '<label for="id-'.$value.'">'.$label.'</label>';
        $html .= '<input type="radio" id="id-'.$value.'" name="'.$nombre.'" value="'.$value.'" '. (($value==$seleccionado) ?  'checked="checked"' :'') .'/>';
        $html .= '<br />';
    }
    
    return $html;
    
}


function pintarCheckboxes($nombre, $arrayValueLabel, $seleccionado){
    $html = '';
    foreach($arrayValueLabel as $value => $label) {
        $html .= "<label for=\"id-$value\">$label</label>";
        $html .= "<input type=\"checkbox\" name=\"$nombre\[]\" value=\"$value\" id=\"id-$value\" ".($value==$seleccionado ? 'checked="checked"' : '')."/>\n";
        $html .= "<br />";
    }
    
    return $html;
    
}

function pintarCheckboxes2($nombre, $arrayValueLabel, $seleccionados){
    $html = '';
    foreach($arrayValueLabel as $value => $label) {
        $html .= "<label for=\"id-$value\">$label</label>";
        $html .= "<input type=\"checkbox\" name=\"$nombre\[]\" value=\"$value\" id=\"id-$value\" ".(in_array($value, $seleccionados) ? 'checked="checked"' : '')."/>\n";
        $html .= "<br />";
    }
    
    return $html;
    
}

?>