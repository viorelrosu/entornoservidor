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
        $checked = (in_array($value, $seleccionados) ? 'checked="checked"' : '');
        $html .= <<<HTML
<input type="checkbox" name="{$nombre}[]" value="$value" id="id-$value" $checked />
<label for="id-$value">$label</label>
<br />
HTML;
    }
    
    return $html;
    
}

function pintarSelect($nombre, $array, $seleccionados, $esMultiple=false){
    $html = $esMultiple ? "<select name=\"{$nombre}[]\" multiple=\"multiple\" >\n" : "<select name=\"$nombre\" >\n";
    
    foreach($array as $value => $label) {
        $selected = (in_array($value, $seleccionados)) ? 'selected="selected"' : '';
        $html .= <<<HTML
<option value="$value" $selected >$label</option>
HTML;
    }
    $html .= "</select>\n";
    
    return $html;
    
}

?>