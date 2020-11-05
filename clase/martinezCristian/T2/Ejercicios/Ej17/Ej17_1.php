<?php
$html = <<<HTML
<form form enctype="multipart/form-data" action="ficherosPost.php" method="post">
Escoge un fichero <input type="file" name=""><br>
Escoge una carpeta destino 
<select>
    <option value="txt">Texto</option>
    <option value="img">Imagen</option>
</select>
</form>
HTML;
echo $html;

?>