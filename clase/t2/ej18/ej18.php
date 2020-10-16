<?php 
$numUno = isset($_GET['numSel']) ? $_GET['numSel'] : '';

?>
<form action="mostrarRadios.php" >
	<h1>Introduce un número entro 1 y 15</h1>
	<input type="hidden" name="numUno" value="<?php echo $numUno; ?>" />
	<input type="number" name="numRadios" min="1" max="15" value="4" style="width: 100px; height: 30px; font-size: 20px;"/>
	<br /><br />
	<input type="submit" value="Enviar" />
</form>


