<?php
session_start();

$_SESSION['numDos'] = isset($_GET['segundo']) ? $_GET['segundo'] : null;
$resultado = "";

if ($_SESSION['numUno'] < $_SESSION['numDos']) {
    $resultado = "El primer numero es MENOR que el segundo";
} else if ($_SESSION['numUno'] == $_SESSION['numDos']) {
    $resultado = "El primer numero es IGUAL que el segundo";
} else {
    $resultado = "El primer numero es MAYOR que el segundo";
}

echo <<< html
Primer número: {$_SESSION['numUno']} <br>
Segundo número: {$_SESSION['numDos']} <br>
$resultado
<hr>
<a href="index.php">volver a introducir números</a>
html;


?>