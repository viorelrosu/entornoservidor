
<?php 

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : false ;
$valor = isset($_GET['valor']) ? $_GET['valor'] : false ;
$caduca = isset($_GET['caduca']) ? $_GET['caduca'] : false ;

$misCookies = isset($_COOKIE) ? $_COOKIE : [];

if($nombre && $valor && $caduca ) {
    echo "cookie $nombre introducida<br />";
   setcookie($nombre, $valor, time() + $caduca); 
}

echo "<h2>Listado de cookies </h2>";
echo "<ul>";
foreach($misCookies as $key => $cookie) {
    echo "<li>$key $cookie </li>";
}
echo "</ul>";

//para borrar cookies
//setcookie('nombre');

?>

<form method="get" >
	<label for="nombre">Nombre cookie</label><br />
	<input type="text" name="nombre" id="nombre" value="" /><br />
	<label for="valor">Valor cookie</label><br />
	<input type="text" name="valor" id="valor" value="" /><br />
	<label for="caduca">Caducidad cookie en segundos</label><br />
	<input type="number" name="caduca" id="caduca" value="10" min="1" max="10" /><br />
	<input type="submit" value="Enviar" />
</form>
