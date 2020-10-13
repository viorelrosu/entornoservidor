<html>
<body>

<form action="mostrar.php" method="post">
	<fieldset>
		<legend>Leyenda</legend>
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" id="nombre" value="" />
	</fieldset>
	<fieldset>
	<label for="contrasenia">Contraseña</label>
	<input type="text" name="contrasenia" id="contrasenia" value="" />
	</fielset>
	<input type="hidden" name="oculto" id="oculto" value="" />
	<p>
	Elige un color<br />
	
	<input type="radio" name="color" id="rojo" value="rojo" /><label for="rojo">Rojo</label><br />
	<input type="radio" name="color" id="azul" value="azul" /><label for="azul">Azul</label><br />
	<input type="radio" name="color" id="rojo" value="rojo" /><label for="rojo">Verde</label><br />
	</p>
	<p>
	Elige un Idioma<br />
	
	<input type="checkbox" name="idioma[]" id="es" value="Español" /><label for="es">Español</label><br />
	<input type="checkbox" name="idioma[]" id="uk" value="Inglés" /><label for="uk">Inglés</label><br />
	<input type="checkbox" name="idioma[]" id="ru" value="Ruso" /><label for="ru">Ruso</label><br />
	</p>
	<p>
	<label for="selSimple">Select simple</label><br />
	<select id="selSimple" name="selSimple">
		<option>Select simple</option>
		<option value="2011" selected>2011</option>
		<option value="2012">2012</option>
		<option value="2013">2013</option>
	</select>
	</p>
	<p>
	<label for="selMultiple">Select multiple</label><br />
	<select id="selMultiple" name="selMultiple[]" multiple="multiple">
		<option value="2011" selected="selected">2011</option>
		<option value="2012">2012</option>
		<option value="2013">2013</option>
	</select>
	</p>
	<p>
	<label for="textArea">Textarea</label><br />
	<textarea name="textArea" cols="15" rows="3" placehodler="Escriba aqui tus comentarios"/></textarea>
	</p>
</form>
</body>
</html>
