<?php
	session_start();
	$_SESSION['pendientes'] = [];
	//unset($_SESSION['pendientes']);
	header('Location: index.php?clear=pendientes');
?>