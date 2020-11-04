<?php
session_start();
require_once 'Carta.php';
//sacamos una nueva carta
$posicionNuevaCarta = rand(0, sizeof($_SESSION['baraja'])-1 );
$nuevaCarta = $_SESSION['baraja'][$posicionNuevaCarta];

//añadimos la nueva carta
$_SESSION['misCartas'][] = serialize($nuevaCarta);

// eliminamos de la baraja la carta sacada
unset($_SESSION['baraja'][$posicionNuevaCarta]);

$_SESSION['baraja'] = array_values($_SESSION['baraja']);

//sumamos el valor de la nueva carta al total
$carta = $_SESSION['misCartas'][ sizeof($_SESSION['misCartas'])-1 ];
$carta = unserialize($carta);
$valor = $carta->valor;

$_SESSION['total'] += $carta->valor;

$status = 'continuar';

if ($_SESSION['total']>7.5) {
	// el jugador ha perdido
    $status = 'pierdo';
}
else if ($_SESSION['total']==7.5)  {
	// el jugador ha ganado (7 y media)
    $status = 'gano';
}

header('Location:jugar.php?status='.$status);

?>