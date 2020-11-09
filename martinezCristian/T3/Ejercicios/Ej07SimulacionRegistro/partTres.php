<?php
session_start();

if (isset($_GET['grabar'])) {
    $departamento = isset($_GET['departamento']) ? $_GET['departamento'] : null;
    $salario = isset($_GET['salario']) ? $_GET['salario'] : null;
    $comentario = isset($_GET['area']) ? $_GET['area'] : null;

    $_SESSION['departamento'] = $departamento;
    $_SESSION['salario'] = $salario;
    $_SESSION['area'] = $comentario;
}

function formularioTres()
{
    $b = isset($_SESSION['banco']) ? "value=\"{$_SESSION['banco']}\"" : "";

    echo <<< HTML
<head>
<style type="text/css">
#img2 {
	opacity: 0.5;
}

#img1 {
	opacity: 0.5;
}

#img4 {
	opacity: 0.5;
}
</style>
</head>
<body>
	<a title="boton1" href="partUno.php"><img id="img1"
		src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-1-icon.png"
		width="50" height="50"></a>
	<a title="boton2" href="partDos.php"><img id="img2"
		src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-2-icon.png"
		width="50" height="50"></a>
	<a title="boton3" href="partTres.php"><img id="img3"
		src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-3-icon.png"
		width="50" height="50"></a>
	<a title="boton4" href="resumen.php"><img id="img4"
		src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/12635.png"
		width="50" height="45"></a>

	<fieldset>
		<legend>Datos bancarios</legend>
		<form action="resumen.php">
			<label for="banco"><b>Cuenta corriente &nbsp;&nbsp;</b></label>
HTML;
    echo "<input type=\"text\" name=\"banco\" id=\"banco\" $b ><br> <input type=\"submit\"" ;

    echo <<< HTML

			value="Grabar información e ir al paso 2 - Datos profesionales" name="grabar">
		</form>

	</fieldset>
</body>
HTML;
    ;
}

formularioTres();

?>