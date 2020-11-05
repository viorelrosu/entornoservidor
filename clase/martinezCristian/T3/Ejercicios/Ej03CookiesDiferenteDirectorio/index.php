<?php
echo "<h1>".pathinfo($_SERVER['REQUEST_URI'])['dirname']."</h1>";
$html = <<< HTML
<h1>Listado de Cookies</h1>
Nivel 0 --> <a href= "verCookies.php" >Listado de cookies</a><br>
Nivel 0 --> Nivel 1 -> <a href= "uno/verCookies.php" >Listado de cookies</a><br>
Nivel 0 --> Nivel 1 -> Nivel 2 --> <a href= "uno/dos/verCookies.php" >Listado de cookies</a><br><br><br>

<h1>Creación de cookies en diferentes niveles(directorios) por un script ubicado en /
 se permite fijar nombre y contenido de la cookie,asi como el nivel</h1>
 
<fieldset>
    <legend>Creación de cookie</legend>
    <form action ="crearCookie.php">
        Nombre: <input type="text" name="nombre" placeholder="Introduce el nombre">&nbsp;&nbsp;
        Contenido:  <input type="text" name="contenido" placeholder="Introduce el contenido"><br>
        Nivel   <select name="nivel">
                    <option value="0" selected="selected">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
        <input type="submit" value ="Crear Cookie" />
    </form>
</fieldset>

HTML;
echo $html;

?>