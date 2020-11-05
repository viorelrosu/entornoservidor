<?php
session_start();

$_SESSION['destino'] = isset($_GET['destino']) ? $_GET['destino'] : null;

foreach ($_SESSION['usuarios'] as $usuario){
    foreach ($usuario as $k=>$v){
        
    }
}
    echo <<< HTML
    
    <form action="listaUsuarios.php">
    De: <input type="text" readOnly value="{$_SESSION['activo']}"><br>
    Para:  <input type="text" readOnly value="{$_SESSION['destino']}"><br> 
    Escribir el contenido del mensaje:<br>  
    <textarea name="area" placeholder="Escriba su mensaje" rows="8" cols="50"></textarea><br>
    <input type="submit">    
HTML;


?>