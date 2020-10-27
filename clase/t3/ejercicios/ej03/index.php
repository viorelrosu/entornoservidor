<?php

echo "Nivel0 --> <a href=\"visualizarCookies.php\">Listado de cookies</a><br />";
echo "Nivel0 --> Nivel1 --> <a href=\"uno/visualizarCookies.php\">Listado de cookies</a><br />";
echo "Nivel0 --> Nivel1 --> Nivel2 --> <a href=\"uno/dos/visualizarCookies.php\">Listado de cookies</a><br /><br />";

?>

<form action="ubicarCookies.php" method="get" >
	<fieldset>
	<legend>Creación de cookie</legend>
	<label for="nombre">Nombre cookie</label><br />
	<input type="text" name="nombre" id="nombre" value="" /><br /><br />
	<label for="valor">Valor cookie</label><br />
	<input type="text" name="valor" id="valor" value="" /><br /><br />
	<label for="nivel">Nivel</label><br />
	<input type="number" name="nivel" id="nivel" value="0" min="0" max="3" /><br /><br />
	<input type="submit" value="Enviar" />
	</fieldset>
</form>