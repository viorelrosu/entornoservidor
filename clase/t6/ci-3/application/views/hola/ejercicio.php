<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio</title>
</head>
<body>
	<?php foreach($etiquetas as $etiqueta): ?>
		<?=anchor($etiqueta['enlace'],$etiqueta['nombre'])?><br />
	<?php endforeach;?>
</body>
</html>