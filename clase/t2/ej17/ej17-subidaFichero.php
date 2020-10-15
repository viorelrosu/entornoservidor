<h1>Form Subida Ficheros</h1>
<form enctype="multipart/form-data" action="subirF.php" method="post">

<label>Escoge un fichero</label><br />
<input type="file" name="myFile" />
<br /><br />
<label>Selecciona una carpeta destino</label><br />
<select name="myFolder" >
	<option value="txt">Texto</option>
	<option value="img">Imagen</option>
</select>
<br /><br />
<input type="submit" value="Enviar" />
</form>
