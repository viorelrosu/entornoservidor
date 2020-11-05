<!doctype html>
<html>
<head>
<style>
span {
	font-weight: bold;
	font-size: x-large;
}

form {
	display: inline;
}

fieldset {
	width: 300px;
	display: inherit;
}

legend {
	font-weight: bold;
	font-size: 20px;
}
</style>
</head>
<body>
	<h3>Cajas de texto</h3>
	
	<form name="f1" method="get">
		<fieldset>
			<legend>Formulario 1</legend>
			<label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre" /><br />
			<label for="apellido">Apellido</label><input type="text" name="apellido" id="apellido" />
			<br /> <br /> 
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	
	<form name="f2" method="get">
		<fieldset>
			<legend>Formulario 2</legend>
			<label for="clave">Password</label><input type="password" name="clave" id="clave" /><br /> 
			<label for="ocultoVacio">Oculto vac&iacute;o</label><input type="hidden" name="ocultoVacio" value ="" /><br /> 
			<label for="ocultoLleno">Oculto lleno</label><input type="hidden" name="ocultoLleno" value="sorpresa" /><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f3" method="get">
		<fieldset>
			<legend>Formulario 3</legend>
			<label for="comentarios">Comentarios</label>
			<textarea name="comentarios" rows="2" cols="40"></textarea>
			<br /> <input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	
	<h3>Botones de radio</h3>
	
	<form name="f4"  method="get">
		<fieldset>
			<legend>Formulario 4</legend>
			<label for="radioVerde">Verde</label><input type="radio" name="radio" id="radioVerde" value="verde" />
			<label for="radioNaranja">Naranja</label><input type="radio" name="radio" id="radioNaranja" value="naranja" />
			<label for="radioRojo">Rojo</label><input type="radio" name="radio" id="radioRojo" value="rojo" /><br /> 
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	
	<form name="f5" method="get">
		<fieldset>
			<legend>Formulario 5</legend>
			<label for="generoMujer">Mujer</label><input type="radio" name="genero" id="generoMujer" value="m" />
			<label for="generoHombre">Hombre</label><input type="radio" name="genero" id="generoHombre" value="h"/>
			<label for="generoOtro">Otro</label><input type="radio" name="genero" id="generoOtro" value="otro"/><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f6" method="get">
		<fieldset>
			<legend>Formulario 6</legend>
			<label for="cabelloM">Moreno</label><input type="radio" name="cabello" id="cabelloM" value="moreno" />
			<label for="cabelloR">Rubio</label><input type="radio" name="cabello" id="cabelloR" value="rubio" />
			<label for="cabelloP">Pelirrojo</label><input type="radio" name="cabello" id="cabelloP" value="pelirrojo" /><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f7" method="get">
		<fieldset>
			<legend>Formulario 7</legend>
			<label for="moreno">Moreno</label><input type="radio" name="radio" id="moreno" value="moreno"/>
			<label for="rubio">Rubio</label><input type="radio" name ="radio" id="rubio" value="rubio"/>
			<label for="pelirrojo">Pelirrojo</label><input type="radio" name="radio" id="pelirrojo" value="pelirrojo"/><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<br />
	<h3>Cajas de chequeo</h3>
	<form name="f8" method="get">
		<fieldset>
			<legend>Formulario 8</legend>
			<label for="checkAficion">Lectura</label><input type="checkbox" name="checkAficion[]" id="checkAficion" value="lectura"/>
			<label for="checkAficion">Deporte</label><input type="checkbox" name="checkAficion[]" id="checkAficion" value="deporte" />
			<label for="checkAficion">Viajes</label><input type="checkbox" name="checkAficion[]" id="checkAficion" value="viajes"/><br /> 
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f9" method="get">
		<fieldset>
			<legend>Formulario 9</legend>
			<label for="checkLectura">Lectura</label><input type="checkbox" name="checkAficion[]" id="checkLectura" />
			<label for="checkDeporte">Deporte</label><input type="checkbox" name="checkAficion[]" id="checkDeportes" />
			<label for="checkViajes">Viajes</label><input type="checkbox" name="checkAficion[]" id="checkViajes" /><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f10" method="get">
		<fieldset>
			<legend>Formulario 10</legend>
			<label for="checkLectura">Lectura</label><input type="checkbox" name="checkAficion[]" id="checkLectura" value="lectura" />
			<label for="checkDeporte">Deporte</label><input type="checkbox" name="checkAficion[]" id="checkDeportes" value="deporte" />
			<label for="checkViajes">Viajes</label><input type="checkbox" name="checkAficion[]" id="checkViajes" value="viajes" /><br />
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
	<form name="f11" method="get">
		<fieldset>
			<legend>Formulario 11</legend>
			<label for="checkLectura">Lectura</label><input type="checkbox" name="checkAficiones[]" value="lectura" id="checkLectura" />
			<label for="checkDeporte">Deporte</label><input type="checkbox" name="checkAficiones[]" value="deporte" id="checkDeporte"/>
			<label for="checkViajes">Viajes</label><input type="checkbox" name="checkAficiones[]" value="viajes" id="checkViajes"/><br /> 
			<input type="submit" value="Enviar datos" />
		</fieldset>
	</form>
</body>
</html>

<?php
?>
