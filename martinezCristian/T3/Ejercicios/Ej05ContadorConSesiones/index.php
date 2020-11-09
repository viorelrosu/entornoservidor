<?php
ini_set ( 'session.use_trans_sid', '1' );
ini_set ( 'session.use_cookies', '0' );
ini_set ( 'session.use_only_cookies', '0' );

session_start();

if (isset($_SESSION['contador'])) {
    $_SESSION['contador'] = $_SESSION['contador']+1;   
} else {    
    $_SESSION['contador'] = 1;  
}

echo "<h1>Visitas: ".$_SESSION['contador']."</h1>";
$html = <<< HTML
<form>
	<input type="submit" value="enviar">
</form>
HTML;
echo $html;
echo session_id();

?>
