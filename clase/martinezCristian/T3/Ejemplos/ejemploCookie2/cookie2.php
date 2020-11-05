<?php

if (isset($_COOKIE[$_GET["nombre"]])) {
    echo "te gustan los/las de
 {$_COOKIE[$_GET["nombre"]]}";
    
} else {
    setcookie($_GET["nombre"],$_GET["valor"],time()+$_GET["caducidad"]);
    echo "poniendo cookie";
}
?>