<?php
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;
$contenido = isset($_GET['contenido']) ? $_GET['contenido'] : null;
$nivel = isset($_GET['nivel']) ? $_GET['nivel'] : null;

if ($nombre != null && $contenido != null && $nivel != null) {

    $ruta = pathinfo($_SERVER['REQUEST_URI'])['dirname'];
    
    switch ($nivel) {
        case 0:
            setcookie($nombre, $contenido, 0, $ruta);
            echo "Me has enviado una cookie con nombre:$nombre y conenido:$contenido de nivel:$nivel<br> a la ruta:$ruta";
            break;
        case 1:
            setcookie($nombre, $contenido, 0, $ruta . "/uno");
            echo "Me has enviado una cookie con nombre:$nombre y conenido:$contenido de nivel:$nivel<br> a la ruta:$ruta/uno ";
            break;
        case 2:
            setcookie($nombre, $contenido, 0, $ruta . "/uno/dos");
            echo "Me has enviado una cookie con nombre:$nombre y conenido:$contenido de nivel:$nivel<br> a la ruta:$ruta/uno/dos";
            break;
    }

} else {
    $resultado = "";
    if ($nombre == null) {
        $resultado .= "NO has proporcionado el nombre <br>";
    }
    if ($contenido == null) {
        $resultado .= "NO has proporcionado el contenido <br>";
    }
    echo $resultado;
}

?>


<a href="index.php">Volver</a>