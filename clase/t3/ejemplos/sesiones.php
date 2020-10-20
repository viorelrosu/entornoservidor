<?php
session_start();
if( isset($_SESSION['nombre']) ) {
		echo "Hola " . $_SESSION['nombre'] . ', me alegro de volver a verte.';
		echo "Los once primeros dobles son: <br>";
		foreach($_SESSION['dobles'] as $num => $doble) {
			echo "2 x ".($num+1)." = $doble <br>";
		}
} else {
	if(isset($_GET['nombre'])) {
	
		echo "Hola " . $_GET['nombre'] . ". Es la primera vez que te veo.";
		$_SESSION['nombre'] = $_GET['nombre'];
		$_SESSION['dobles'] = [];
		for($i=1; $i<=10; $i++) {
			$_SESSION['dobles'][] = 2*$i; 
		}
	
	} else {
		echo <<<FORM
		Dime tu nombre
		<form>
			<input type="text" name="nombre" value="" />
			<input type="submit" />
		</form>
		FORM;
	 }
}


?>