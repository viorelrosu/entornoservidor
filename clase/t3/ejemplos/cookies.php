<?php
echo "COOKIES GUSTOS<br />";
if(isset($_COOKIE['gustos'])) {
    echo "El valor de la cookie gustos es ".$_COOKIE['gustos'];
} else {
    setcookie('gustos','zapatillas', time()+20);
}

?>