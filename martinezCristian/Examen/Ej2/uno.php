
<?php 
session_start();

echo <<< html
    <h1>Introduce un número</h1>
    
    <form action="dos.php">

    <input type="text" name="primero">
    <input type="submit" value="Siguiente">

    </form>
html;


?>