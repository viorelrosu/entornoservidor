<head>
	<style>
	   td{
	       text-align: center;
	   }
	</style>
</head>

<?php
echo "usuario actual";

echo "<h2>Lista mensajes de usuario que envió los mensajes</h2>";

echo <<< HTML
    <table>
    <tr>
        <th>Fecha</th> <th>Texto</th><br>
    </tr>
    <tr>
        <td>20/12/2020</td> <td>HOLA QUE TAL</td><br>  
    </tr>
    <tr>
        <td>20/12/2020</td> <td>HOLA QUE TAL2</td><br>
    </tr>
    <tr>
        <td>20/12/2020</td> <td>hacer foreach de los mensajes y crear los tr y td en cada vuelta</td><br>
    </tr>
    
    </table>
    
    <a href="listaUsuarios.php">Volver a lista de usuarios</a>
HTML;


?>