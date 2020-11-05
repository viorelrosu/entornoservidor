<?php
session_start();
if (isset($_GET['accion'])) {
    if ($_GET['accion'] == "Añadir palabras" || $_GET['accion'] == "Aniadir palabras") {

        echo <<< html
       <form action="aniadir.php">
       ESPAÑOL <input type="text" name="espaniol"><br>
       INGLÉS &nbsp;<input type="text" name="ingles"><br>
       FRANCÉS <input type="text" name="frances"><br>
       <input type="submit" name="aniadir" value="Actual=>Pendientes"><br>
       <input type="submit" name="aniadir" value="Pendientes=>Diccionario">
       <input type="submit" name="cancelar" value="Cancelar">
       </form>
        <a href="uno.php">Volver al inicio<a>
html;
    }

    if ($_GET['accion'] == "Traducir") {
//         if (empty($_SESSION['diccionario'])) {
//             echo "Diccionario vacio";
//         } else {
//             foreach ($_SESSION['diccionario']['palabras'] as $key => $value) {
//                 echo "{$value['espaniol']} {$value['ingles']} {$value['frances']}<br>";
//             }
//         }
    print_r($_SESSION['diccionario']);
    }
}