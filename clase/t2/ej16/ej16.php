<?php
$passwd = isset($_POST['passwd']) ? $_POST['passwd'] : false ;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false ;

$validoNombre = ($nombre != '');
$validoPass = ((strlen($passwd) >= 6 && strlen($passwd) <= 12 ));

if($passwd && $nombre && $validoNombre && $validoPass) {
    echo "Hola $nombre. Tu contraseña es $passwd.";
} else {
    
?>

<form action="" method="post">
<label>Nombre</label>
<input type="text" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" />
<?php echo (!$validoNombre) ? '<span style="color:red">El Nombre es obligatorio</span>' : '' ;?>
<br />
<label>Contraseña</label>
<input type="password" name="passwd" value="<?php echo isset($passwd) ? $passwd : ''; ?>" />
<?php echo (!$validoPass) ? '<span style="color:red">La contraseña tiene que tener entre 6 y 12 carácteres.</span>' : '' ;?>
<br />
<input type="submit" value="Enviar" />
</form>

<?php } ?>

