<?php
require 'util.php';

// if (isset($_COOKIE[$_GET['nombre']])){
//     echo "Yo a ti ya te conozco, eres: {$_GET['nombre']}";
// } else {
//     if (isset($_GET['nombre'])){
//         echo "Hola desconocido";
//         $id = generaCadenaAleatoria();
//         setcookie($_GET['nombre'], $id);
//     } else  {
//     $html = <<<HTML
//     Dime tu nombre
//     <form action="">
//         <input type="text" name="nombre"/>
//         <input type="submit">
//     </form>
// HTML;
//    echo $html;
//     }
    
    
    if (isset($_COOKIE['UID'])){
        echo "Yo a ti ya te conozco, eres: UID.{$_COOKIE['UID']}";
    } else{
        echo "hola desconocido";
        $id = generaCadenaAleatoria();
        setcookie("UID", $id);
    }
//}
?>