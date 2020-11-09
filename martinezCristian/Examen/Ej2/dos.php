<?php
session_start();
$_SESSION['numUno'] = isset($_GET['primero']) ? $_GET['primero'] : null;

echo <<< html
    <h1>Introduce otro número</h1>
    <form action="tres.php">
    <input type="text" name="segundo">
    <input type="submit" value="Siguiente">
    </form>
html;

