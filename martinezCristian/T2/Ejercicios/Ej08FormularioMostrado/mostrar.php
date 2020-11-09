<?php
$resultado = "";

$resultado .= empty($_GET['nombre']) ? "Sin nombre<br>" : "Nombre: {$_GET['nombre']}<br>" ;
$resultado .= empty($_GET['pwd']) ? "Sin password<br>" : "Password: {$_GET['pwd']}<br>" ;
$resultado .= empty($_GET['oculto']) ? "No hay oculto<br>" : "Oculto: {$_GET['oculto']}<br>" ;

if ($_GET['color'] == "rojo"){
    $resultado .= "Color: {$_GET['color']}<br>" ;
} else if ($_GET['color'] == "naranja"){
    $resultado .= "Color: {$_GET['color']}<br>" ;
} else {
    $resultado .= "Color: {$_GET['color']}<br>" ;
}

$resultado .= "Idioma: ";
if (isset($_GET['idioma'])){
    foreach ($_GET['idioma'] as $idioma){
        $resultado .= next($_GET['idioma']) ? $idioma.", " : $idioma;
    }
} else {
    $resultado .= "No hay idiomas seleccionados";
}
$resultado .= "<br>";

$resultado .= empty($_GET['anios']) ? "No hay oculto<br>" : "Año seleccionado: {$_GET['anios']}<br>" ;

$resultado .= "Ciudad: ";
if (isset($_GET['ciudades'])){
    foreach ($_GET['ciudades'] as $ciudad){
        $resultado .= next($_GET['ciudades']) ? $ciudad.", " : $ciudad;
    }
} else {
    $resultado .= "No hay ciudades seleccionadas";
}
$resultado .= "<br>";

$resultado .= empty($_GET['text']) ? "Sin texto" : "Texto: {$_GET['text']}<br>" ;
$resultado .= "<br>";

$resultado .= empty($_GET['imagen']) ? "No se ha insertado imagen" : "Existe imagen incorporada";

echo $resultado;



?>