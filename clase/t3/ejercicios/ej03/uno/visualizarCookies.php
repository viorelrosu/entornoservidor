<?php

$misCookies = isset($_COOKIE) ? $_COOKIE : [];
echo "<h2>Listado de cookies /class/t3/ej03/uno/</h2>";
echo "<ul>";
foreach($misCookies as $key => $cookie) {
    echo "<li>$key $cookie </li>";
}
echo "</ul>";

echo '<a href="../index.php">Volver</a>';

?>