<?php

 $numSel = isset($_GET['numSel']) ? $_GET['numSel']: false;
 
 if($numSel) {
     echo '<h1>Resultado final</h1>';
     echo '<h2>'.$numSel.' + 2 = ' . ($numSel+2).'<h2>';
     echo '<br />';
 }
