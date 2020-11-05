
<?php
session_start();

$palabra = $_GET['palabra'];
$lengua = $_GET['lengua'];
$contador = 0;
$existe = false;
// echo "<input type=\"text\" value=\"$palabra\" >";
if (isset($_GET['palabra']) && $_GET['palabra'] != "") {

            $contador = 0;
            foreach ($_SESSION['diccionario']['palabras'] as $k => $v) {
                if ($palabra == $v["espaniol"] || $palabra == $v["ingles"] || $palabra == $v["frances"]) {
                    $existe = true;
                    $contador ++;
                    $palabra = $v["$lengua"];
                }
            }
            if ($existe && $contador < 2) {
                echo "<input type=\"text\" value=\"" . $palabra . "\" readonly>";
            } else {
                echo "<input type=\"text\" value=\"no computable\" readonly>";
            }

            if ($existe == false) {
                echo "<input type=\"text\" value=\"no hay traduccion\" readonly>";
            }

} else {
    echo "<input type=\"text\" value=\"escribe algo!\" readonly>";
}

?>