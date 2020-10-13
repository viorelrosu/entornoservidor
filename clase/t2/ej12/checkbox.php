<?php

require_once('../helpers/utilHTML.php');

echo pintarCheckboxes('aficion', ['D'=>'Deportes','C'=>'Cine'], 'C');
echo pintarCheckboxes2('aficion', ['D'=>'Deportes','C'=>'Cine'], ['C','D']);