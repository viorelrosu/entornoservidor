<?php
if (isset($_COOKIE['miCookie'])) {

    echo $_COOKIE['miCookie'] == 1 ? "Has entrado {$_COOKIE['miCookie']} vez a la página" : "Has entrado {$_COOKIE['miCookie']} veces a la página";
    setcookie("miCookie", $_COOKIE['miCookie'] + 1);
} else {
    echo "BIENVENIDO";
    setcookie("miCookie", 1);
}