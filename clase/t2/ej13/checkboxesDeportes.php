<form>

<?php

require_once('../helpers/utilHTML.php');
echo pintarCheckboxes2('aficion', ['F'=>'Futbol','T'=>'Tenis','V'=>'Vela'], ['V','F']);

?>

<input type="submit" value="Enviar" />
</form>