<?php
function conectarMySQL(
    $schema = 'daw2_servidor_vio',
    $usu = 'root',
    $pwd = '',
    $host = 'localhost'
    ) {
        try {
            $dsn = "mysql:host=$host;dbname=$schema";
            $db = new PDO($dsn, $usu, $pwd);
        }
        catch (PDOException $e) {
            print ("ERROR de conexión a $schema");
            die();
        }
        return $db;
}

?>