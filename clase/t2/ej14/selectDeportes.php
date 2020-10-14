<form>
<?php

require_once('../helpers/utilHTML.php');
echo pintarSelect('aficion', ['F'=>'Futbol','T'=>'Tenis','V'=>'Vela'], ['V','T'], true);

?>

<input type="submit" value="Enviar" />
</form>