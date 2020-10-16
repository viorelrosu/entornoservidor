<?php
echo "COOKIES GUSTOS<br />";
if(isset($_COOKIE['gustos'])) {
    echo "Te gustan las ".$_COOKIE['gustos'];
} else {
    setcookie('gustos','zapatillas');
}


?>