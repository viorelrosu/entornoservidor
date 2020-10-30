<?php
$datos = $_POST;
ksort($datos);
$html = '';
$html .= '<ul>';
foreach ($datos as $key => $dato) {
	$html .= '<li>'.$dato.'</li>';
}
$html .= '</ul>';
echo $html;
?>