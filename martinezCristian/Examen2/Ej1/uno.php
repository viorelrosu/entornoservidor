<head>
	<script type="text/javascript">
		
	
	</script>
</head>
<?php
session_start();



echo <<< html
    <h2>Lista de palabras del diccionario</h2>
    <br>
    <h1>ESPAÑOL &nbsp;&nbsp;&nbsp; INGLÉS &nbsp;&nbsp;&nbsp; FRANCÉS</h1>
html;
if (empty($_SESSION['diccionario'])) {
    echo "Diccionario vacio";
} else {
    foreach ($_SESSION['diccionario']['palabras'] as $key => $value) {
        echo "{$value['espaniol']} {$value['ingles']} {$value['frances']}<br>";
    }
}

echo <<< html
    <form action="accion.php">
    <input type="submit" name="accion" value="Añadir palabras"> &nbsp;&nbsp;
    <input type="button" name="accion" value="Traducir" onClick="window.location.href='unoej2.php'">
    </form>

html;
?>