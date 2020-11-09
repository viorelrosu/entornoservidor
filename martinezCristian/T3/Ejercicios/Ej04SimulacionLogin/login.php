
<?php
if(isset($_GET['leng'])){
    //echo "<h1>{$_GET['leng']}</h1>";
    $valorE = $_GET['leng'] == "ES" ? "checked=\"checked\"" : "";
    $valorI = $_GET['leng'] == "EN" ? "checked=\"checked\"" : "";
    $valorF = $_GET['leng'] == "FR" ? "checked=\"checked\"" : "";
} else {
    $valorE = "";
    $valorI = "";
    $valorF = "";
    
}


if (isset($_COOKIE[$_GET['nombre']])) {
    echo "Hola {$_GET['nombre']}. Número de visitas : {$_COOKIE[$_GET['nombre']]}";
    

    echo '<form action="logOut.php">';
    echo '<input type="submit" value="desconectar">';
    echo "<img src=\"https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/es.png\"
			border=\"1px\" width=\"45px\" height=\"45px\"></img><input type=\"radio\" name=\"leng\" value=\"ES\" $valorE> ";
    echo "<img src=\"https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/gb.png\"
			border=\"1px\" width=\"45px\" height=\"45px\"></img><input type=\"radio\" name=\"leng\" value=\"EN\" $valorI> ";
    echo "<img src=\"https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/fr.png\"
			border=\"1px\" width=\"45px\" height=\"45px\"></img><input type=\"radio\" name=\"leng\" value=\"FR\" $valorF> ";
    echo '<hr>';
    echo "<input type=\"hidden\" name =\"nombre\" value=\"{$_GET['nombre']}\">";


    echo "</form>";
} else {
    $user = isset($_GET['nombre']) ? $_GET['nombre'] : "";
    $pwd = isset($_GET['pwd']) ? $_GET['pwd'] : "";

    if ($user != "" && $pwd != "") {
        setcookie($_GET['nombre'], 1);
        echo "<font color=\"blue\">A partir de ahora te recordaré {$_GET['nombre']}</font><br>";

        $html = <<< HTML
    <h1>Tratamiento de cookies</h1>
    <form action="login.php">
	   <label for="nombre">Usuario</label><input type="text" name="nombre" id="nombre"/><br>
	   <label for="clave">Clave</label><input type="text" name="pwd" id="clave"/><br>
	   <input type="submit" value="Autenticar">
    </form>
HTML;

        echo $html;
    } else {

        $html = <<< HTML
    <h1>Tratamiento de cookies</h1>
    <form action="login.php">
	   <label for="nombre">Usuario</label><input type="text" name="nombre" id="nombre"/><br>
	   <label for="clave">Clave</label><input type="text" name="pwd" id="clave"/><br>
	   <input type="submit" value="Autenticar">
    </form>
HTML;
        echo $html;
        echo '<font color="red">Datos erroneos</font>';
    }
}

?>