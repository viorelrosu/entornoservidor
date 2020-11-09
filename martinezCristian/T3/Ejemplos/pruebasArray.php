<?php
session_start();
$_SESSION['usuario'] = array();
$_SESSION['usuario']["usuario"]["Cristian"] = [
    "pwd" => "contraseña",
    "mensajes" => [
        0 => [
            "remitente" => "remitente1",
            "hora" => "hora",
            "texto" => "mensaje1"
        ]
    ]
];

$_SESSION['usuario']["usuario"]["Raquel"] = [
    "pwd" => "contraseña2",
    "mensajes" => [
        0 => [
            "remitente" => "remitente2",
            "hora" => "hora",
            "texto" => "mensaje2"
        ]
    ]
];
$hoy = date("F j, Y, g:i a");

//echo "$hoy";
//$bd['usuario']["Raquel"]['mensajes'][] = ["remitente"=>"Cristian","hora"=>$hoy,"texto"=>"texto insertado 1"];
//$bd['usuario']["Raquel"]['mensajes'][] = ["remitente"=>"Cristian","hora"=>$hoy,"texto"=>"texto insertado 2"];
$_SESSION['usuario']['usuario']["Raquel"]['mensajes'][] = ["remitente"=>"Cristian","hora"=>$hoy,"texto"=>"texto insertado 3"];

foreach ($_SESSION['usuario']['usuario']['Raquel']['mensajes'] as $key => $value) {
    //foreach ($key as $keyR=>$valorR){
        echo "Número mensaje:$key =&nbsp;&nbsp; REMITENTE:{$value['remitente']}&nbsp;&nbsp; FECHA:{$value['hora']}&nbsp;&nbsp; TEXTO:{$value['texto']}<br>";
   // }
    
}

echo <<<    html
    


html;

?>