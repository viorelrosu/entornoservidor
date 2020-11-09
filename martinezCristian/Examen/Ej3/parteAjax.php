<?php
if (isset($_GET['envio'])) {

    if ($_GET['envio'] == "pelicula") {
        $arr = [
            'Star Wars',
            'Titanic',
            'Crepúsculo',
            'Los juegos del hambre'
        ];

        $rnd = rand(0, sizeof($arr)-1);

        echo <<< html
            <input type="text" value="$arr[$rnd]" readonly>

html;
    }

    if ($_GET['envio'] == "cancion") {
        $arr = [
            'Let it be',
            'Mediterráneo',
            'Close to the edge',
            'Bohemian Rhapsody'
        ];

        $rnd = rand(0, sizeof($arr)-1);

        echo <<< html
 
           <input type="text" value="$arr[$rnd]" readonly>

html;
    }
}

?>