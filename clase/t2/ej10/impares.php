<?php
require_once('../helpers/utilHTML.php');

for($i=1; $i<=50; $i++) {
    echo ($i%2 != 0) ? resaltar($i) : $i;
}

?>