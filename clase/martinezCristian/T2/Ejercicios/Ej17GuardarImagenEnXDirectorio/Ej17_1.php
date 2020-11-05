<form enctype="multipart/form-data" action="Ej17_2Post.php" method="POST">
	Escoge un fichero: 
	<input type="file" name="fichero" id="fichero"><br>
	Escoge una carpeta de destino: 
	<select name="destino" id="destino">
		<option value="txt">Texto</option>
		<option value="img">Imagen</option>
	</select><br>
	<input type="submit" value="Enviar"/>
</form>



<?php
?>