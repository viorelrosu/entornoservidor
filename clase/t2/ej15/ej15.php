<?php 
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : false ;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;
    
   
    if($passwd) {
        echo "Hola $nombre. Tu contraseña es $passwd.";
    } else { 

?>

<form action="" method="post">
<label>Nombre</label>
<input type="text" name="nombre" value="" />
<br />
<label>Contraseña</label>
<input type="password" name="passwd" value="" />
<br />
<input type="submit" value="Enviar" />
</form>

<?php } ?>

