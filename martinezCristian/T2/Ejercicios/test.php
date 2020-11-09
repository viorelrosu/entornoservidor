<?php
//========================      TEST1    ======================================

// if ($_GET["radio"] == "verde"){
// $html = <<<HTML
// <h1>El puto radio es verde<h1>
// HTML;
// echo $html;
// } else if ($_GET["radio"] == "naranja"){
// $html = <<<HTML
// <h1>El puto radio es naranja<h1>
// HTML;
// echo $html;
// } else {
// $html = <<<HTML
// <h1>El puto radio es rojo<h1>
// HTML;
// echo $html;
// }


//========================      TEST2     ======================================
if (isset($_GET['checkAficion'])) {
    foreach ($_GET['checkAficion'] as $aficion) {
        echo $aficion . ' ';
    }
} else {
    echo <<<HTML
    <h1>No tiene nungún valor</h1>
HTML;
}
?>