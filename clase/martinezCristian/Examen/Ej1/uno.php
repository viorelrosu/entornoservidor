<?php

echo <<< html
<h1>Introduce dos número entre el 1 y el 12</h1>
<form action="dos.php">
<label for="inferior">Cota inferior &nbsp;&nbsp;</label><input type="text" name="numMenor" id="inferior"><br>
<label for="superior">Cota superior &nbsp;</label><input type="text" name="numMayor" id="superior"><br>
<input type="submit" value="Continuar">
</form>
html;



?>