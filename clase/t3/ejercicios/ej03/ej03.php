<?php

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : false ;
$valor = isset($_GET['valor']) ? $_GET['valor'] : false ;
$nivel = isset($_GET['nivel']) ? $_GET['nivel'] : false ;


if($nombre && $valor && $nivel ) {
    echo "cookie $nombre introducida<br />";
    setcookie($nombre, $valor, '', '/t3/ejercicios/ej03/nivel'.$nivel.'.php');
}

echo "Nivel0 --> <a href=\"nivel0.php\">Listado de cookies</a><br />";
echo "Nivel0 --> Nivel1 --> <a href=\"nivel1.php\">Listado de cookies</a><br />";
echo "Nivel0 --> Nivel1 --> Nivel2 --> <a href=\"nivel2.php\">Listado de cookies</a><br /><br />";

?>

<form method="get" >
	<fieldset>
	<legend>Creación de cookie</legend>
	<label for="nombre">Nombre cookie</label><br />
	<input type="text" name="nombre" id="nombre" value="" /><br />
	<label for="valor">Valor cookie</label><br />
	<input type="text" name="valor" id="valor" value="" /><br />
	<label for="nivel">Nivel</label><br />
	<input type="number" name="nivel" id="nivel" value="0" min="0" max="3" /><br />
	<input type="submit" value="Enviar" />
	</fieldset>
</form>