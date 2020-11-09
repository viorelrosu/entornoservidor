

<?php
echo "Adiós usuario {$_GET['nombre']},Hasta pronto!";

if (isset($_GET['leng'])) {
    //echo $_GET['leng'];
    $bandera = $_GET['leng'];
} else {
    $bandera = "";
}

echo "<h1>Tratamiento de cookies</h1>";
echo "<form action=\"login.php\">";
echo "<label for=\"nombre\">Usuario</label><input type=\"text\" name=\"nombre\" id=\"nombre\"/><br>";
echo "<label for=\"clave\">Clave</label><input type=\"text\" name=\"pwd\" id=\"clave\"/><br>";
echo "<input type=\"submit\" value=\"Autenticar\">";
echo "<input type=\"hidden\" name= \"leng\" value=\"$bandera\"  > ";
echo '</form>';
setcookie($_GET['nombre'], $_COOKIE[$_GET['nombre']] + 1);

?>