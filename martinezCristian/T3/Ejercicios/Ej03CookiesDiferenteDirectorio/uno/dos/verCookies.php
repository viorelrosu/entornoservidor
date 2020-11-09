<table border="1">
<tr>
	<th>Nombre Cookie</th>
	<th>Contenido Cookie</th>
</tr>
<?php
foreach ($_COOKIE as $key=>$valor){
    echo "<tr><td>$key</td><td>$valor</td></tr>";
}

?>
</table>