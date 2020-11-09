<?php
session_start();

$flag = false;
function elegirPalabra() {
    $ArrPalabras = ["Pelota","Avión","Diccionario","Pingüino"];
    
    $rnd = rand(0,sizeof($ArrPalabras)-1);
    return $ArrPalabras[$rnd];
}


do{
echo <<< HTML
    <head>
	<style>
        #miDiv{border: 3px solid black; }
        .tabla{border: 1px solid black; }
    </style>
</head>
<body>
<h2>BIENVENIDO.Para empezar a jugar introduce una letra</h2>


<form action="index.php">
Introduce letra: <input type="text" size="1" name="letra" id="letra">
</form>
HTML;

if (isset($_GET['letra'])) {
    $letra = $_GET['letra'];
}

$palabra = elegirPalabra();
$_SESSION['palabra'] = $palabra;

echo "<table class=\"tabla\" name=\"resultado\"><tr class=\"tabla\">";
    for ($i = 0; $i < strlen($palabra)-1; $i++) {
        echo <<< HTML
           <td class="tabla" name="letra$i">- -</td>
HTML;
  
    }
echo "</tr></table>";
echo <<< HTML
   <div id="miDiv" border="1">
   <b>Palabra Oculta: </b>  $palabra  <br>
   <b>Letras probadas: </b>                     <br>
   <b>Número de intentos: </b>                  <br>
   <b>Número de fallos<b>                       <br> 
    </div>
    </body>
HTML;
} while ($flag != false);
?>