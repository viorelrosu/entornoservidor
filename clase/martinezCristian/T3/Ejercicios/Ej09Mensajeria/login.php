<?php
session_start();

if (isset($_SESSION['usuarios'])){
    $bd = $_SESSION['usuarios'];
    echo "usuarios registrados: ";
    
    foreach ($bd as $uno){
        foreach($uno as $k=>$v){
            echo "ID:$k Pass:$v&nbsp;&nbsp;&nbsp;"; 
        }
    }
}
echo <<<HTML
    <h1>LOGIN</h1>
    <form action="listaUsuarios.php">
    <label for="nombre">Nombre&nbsp;</label><input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre"><br>
    <label for="pass">Contraseña&nbsp;</label><input type="text" id="pass" name="pass" placeholder="Introduce la contraseña"><br>
    <label for="check">Recordar</label><input type="checkbox" name="check" id="check" value="recordar"><br>
    <input type="submit" value="Enviar" name="enviarLista">
    </form>
    <a href="registrar.php">Registrar nuevo usuario</a>
HTML;

?>