<?php

$numVisitas = isset($_COOKIE['visitas']) ? ($_COOKIE['visitas']+1) : 1;


if(isset($_COOKIE['visitas'])) {
    setcookie('visitas', $numVisitas );
    echo "Hola es la vez número $numVisitas";
} else {
    echo "Bienvenido";
    setcookie('visitas', $numVisitas );
}