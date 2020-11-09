    <form action="mostrar.php">
        <label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre"><br>
        <label for="pwd">Contraseña</label><input type="password" name="pwd" id="pwd"><br>
        <label for="oculto">Oculto</label><input type="hidden" name="oculto" id="oculto" value="oculto"><br>
        <hr>
        <label for="colorRojo">Rojo</label><input type="radio" name="color" id="colorRojo" value="rojo" checked="checked">
        <label for="colorNaranja">Naranja</label><input type="radio" name="color" id="colorNaranja" value="naranja">
        <label for="colorVerde">Verde</label><input type="radio" name="color" id="colorVerde" value="verde"><br>
        <hr>
        <label for="español">Español</label><input type="checkbox" name="idioma[]" id="español" checked="checked" value="Español" >
        <label for="ingles">Inglés</label><input type="checkbox" name="idioma[]" id="ingles" value="Ingles">
        <label for="aleman">Alemán</label><input type="checkbox" name="idioma[]" id="aleman" value="Aleman"><br>
        <hr>
        <select name="anios" id="anios">
            <option value="2011" selected="selected">2011</option>
            <option value="2012">2012</option>
            <option value="2020">2020</option>
        </select><br>
        <hr>
        <select name="ciudades[]" id="ciudades" multiple>
            <option value="Madrid" selected="selected">Madrid</option>
            <option value="Barcelona" selected="selected">Barcelona</option>
            <option value="Bilbao">Bilbao</option>
        </select><br>
        <hr>
        <label for="areaText">Texto: </label> <textarea name="text" id="areaText" cols="50" rows="5" placeholder="Escriba aquí sus comentarios"></textarea>
        <hr>
        <label for="img">Imagen</label> <input type="file" name="imagen" id="img">
        <hr>
        <input type="submit" value="Validar">
        <input type="reset" value="Reset">
    </form>

<?php
?>