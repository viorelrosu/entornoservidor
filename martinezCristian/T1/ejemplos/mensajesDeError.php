<?php

echo "principio\n";


echo "zona peligrosa 1\n";

//  /*1*/   echo "zona peligrosa 2\n"
//  /*2*/   echo $a;
//  /*3*/   echo 7/0;
//  /*4*/   echo f();
echo "zona peligrosa 2\n";


echo "fin";

//parse error: error sintactico    echo "zona peligrosa 2\n"
//notice error: usar una variable no inicializada   echo $a (sin declararla);
//warning: dividir algo entre 0;
//fatal error: llamar una funcion no definida.


//CORREGIR ERRORES


error_reporting("E_PARSE | E_WARNING");
error_reporting(0);
echo $nombre;




?>