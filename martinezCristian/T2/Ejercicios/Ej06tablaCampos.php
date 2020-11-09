<?php
echo <<<HTML
<html>
<head>
<meta charset ="utf-8"/>
</head>
<body>
<table border="1">
<tr>
<th>#</th><th>Caracter</th><th>Cod.URL</th>
</tr>
HTML;

for ($i = 0; $i <= 255; $i++) {
    $char = chr($i);
    $codUrl = urlencode(chr($i));
    echo <<<HTML
    <tr>
        <td> $i </td>
        <td> $char </td>
        <td> $codUrl </td>
    </tr>
HTML;
}
    
echo <<<HTML
<table>
</body>
</html>
HTML;

?>