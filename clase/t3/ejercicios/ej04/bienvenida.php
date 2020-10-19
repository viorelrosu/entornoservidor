<?php

require_once 'bdUsuarios.php';
require_once 'util.php';

$usuario = isset ( $_REQUEST ['usuario'] ) ? $_REQUEST ['usuario'] : null;
$pwd = isset ( $_REQUEST ['pwd'] ) ? $_REQUEST ['pwd'] : null;

$isLoginValid = ( isset ( $bd[$usuario] ) && $bd[$usuario] == $pwd );

if($isLoginValid) {
    
    if( isset($_COOKIE[$usuario]) ) {
        $datosCookie = explode ( '#', $_COOKIE[$usuario] );
        $nVisitas = $datosCookie[0];
        $bandera = $datosCookie[1];
    } else {
        $nVisitas = 1;
        $bandera = 'es';
    }
    
    echo <<<HTML
		Conectado como $usuario <br/>
		N&uacute;mero de visitas $nVisitas<br/>
		<form action="login.php">
HTML;
    pintarBanderas( $bandera );
    echo <<<HTML
			<input type="submit" value="Desconectar">
			<input type="hidden" name="usuario" value="$usuario">
			<input type="hidden" name="nVisitas" value="$nVisitas">
		</form>
HTML;
    
} else {
    echo "Usuario desconocido. Por favor intenta de nuevo.";
}

?>