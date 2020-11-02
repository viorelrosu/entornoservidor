<?php
$BDetiquetas=[
	"ES"=>[
		"Palabra",
		"Traducción",
		"Enviar"
	],
	"UK"=>[
		"Word",
		"Translation",
		"Send"
	],
	"FR"=>[
		"Mot",
		"Traduction",
		"Envoyer"
	]
];

function pintarRadioPaises($seleccionado) {
	global $BDetiquetas;
	$paises = array_keys($BDetiquetas);
	foreach ( $paises as $v ) {
		echo "<span><img src=\"../img/$v.png\" width=\"35\"></span>";
		echo "<input type=\"radio\" name=\"idioma\" id=\"id$v\" value=\"$v\"" . ($v == $seleccionado ? 'checked="checked"' : '') . ' onChange="peticionAjax()">' . PHP_EOL;
	}
}
?>