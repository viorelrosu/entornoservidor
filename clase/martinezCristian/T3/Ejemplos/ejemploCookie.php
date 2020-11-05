<?php

//acceder a cookies

if (isset($_COOKIE["gustos"])){
    echo "Te gustan los {$_COOKIE["gustos"]}";
} else {
    setcookie("gustos","ordenadores");
    echo "COOKIE PUESTA";
}


?>