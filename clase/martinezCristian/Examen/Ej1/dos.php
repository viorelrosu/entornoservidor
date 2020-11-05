<?php
if (isset($_GET['numMenor']) && $_GET['numMenor'] != "") {
    $menor = $_GET['numMenor'] - 1;
}

if (isset($_GET['numMayor']) && $_GET['numMayor'] != "") {
    $mayor = $_GET['numMayor'] - 1;
}

$arrZodiaco = [
    "Capricornio",
    "Acuario",
    "Piscis",
    'Aries',
    'Tauro',
    'Géminis',
    'Cáncer',
    'Leo',
    'Virgo',
    'Libra',
    'Escorpio',
    'Sagitario'
];
$arrMeses = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'octubre',
    'Noviembre',
    'Diciembre'
];

echo <<< html
<form action="tres.php">
<fieldset>
<legend>Signodos del zodiaco</legend>

html;

for ($i = $menor; $i <= $mayor; $i ++) {
    $check = $i == $menor? "checked=\"checked\"" : "";
    echo <<< html
    <input type="radio" value="$arrZodiaco[$i]" name="zodiaco" $check> &nbsp; $arrZodiaco[$i]<br>
html;
}
echo "</fieldset>";
echo <<< html
<fieldset>
<legend>Meses del año</legend>
<select name="meses" id="meses">
html;
for ($i = 0; $i < sizeof($arrMeses); $i ++) {

    echo <<< html
        <option value="$arrMeses[$i]"> &nbsp; $arrMeses[$i]<br>
html;
}
echo <<< html
</select></fieldset>
html;
echo " <input type=\"submit\" value=\"Continuar\"> </form> ";

?>