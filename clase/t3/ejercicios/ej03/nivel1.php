<?php

$misCookies = isset($_COOKIE) ? $_COOKIE : [];
echo "<h2>Listado de cookies </h2>";
echo "<ul>";
foreach($misCookies as $key => $cookie) {
    echo "<li>$key $cookie </li>";
}
echo "</ul>";