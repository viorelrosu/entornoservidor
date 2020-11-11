<?php
function conectarMySQL(
    $schema = 'daw_servidor',
    $usu = 'root',
    $pwd = 'root',
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
