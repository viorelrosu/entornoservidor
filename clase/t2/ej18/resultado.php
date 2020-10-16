<?php

 $numSel = isset($_GET['numSel']) ? $_GET['numSel']: false;
 $numUno = isset($_GET['numUno']) ? $_GET['numUno'] : false;
 
 if($numSel) {
     echo '<h1>Resultado final</h1>';
     echo '<h2>'.$numSel.' + '.$numUno.' = ' . ($numSel+$numUno).'<h2>';
     echo '<br />';
 }
