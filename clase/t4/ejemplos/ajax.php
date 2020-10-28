<?php
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'xmlhttprequest' ) : false ;

if($isAjax) {
    echo "<h2>Texto nuevo</h2>";
} else {
    echo "Solo ejecuciones Ajax";
}

?>