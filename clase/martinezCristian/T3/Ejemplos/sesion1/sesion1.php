<?php
session_start();
//las sesiones se almacenan en xampp/tmp
echo "Sesión iniciada<br>   ";
echo "para saber el id de sesion el comando session_id: ".session_id();
?>