<?php
    $numRadios = isset($_GET('numRadios')) ? $_GET['numRadios'] : false;
    
    if($numRadios) {
        for($i=$numRadios; $i>=1; $i-- ){
            echo <<<HTML
                <input type="radio" name="numeros" value="" />
            HTML;
        }
    }
    
?>