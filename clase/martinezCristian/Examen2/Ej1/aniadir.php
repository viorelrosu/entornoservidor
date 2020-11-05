<?php
session_start();

if (isset($_GET['aniadir'])) {
    
    if ($_GET['aniadir'] == "Actual=>Pendientes") {
        $espaniol = isset($_GET['espaniol']) && $_GET['espaniol'] != "" ? $_GET['espaniol'] : null;
        $ingles = isset($_GET['ingles']) && $_GET['ingles'] != "" ? $_GET['ingles'] : null;
        $frances = isset($_GET['frances']) && $_GET['frances'] != "" ? $_GET['frances'] : null;

        if ($espaniol != null && $frances != null && $ingles != null) {
            $_SESSION['pendientes']['palabras'][] = [
                "espaniol" => $espaniol,
                "ingles" => $ingles,
                "frances" => $frances
            ];

            echo "PALABRAS AÑADIDAS<br>";
            echo "<h3>ESPAÑOL  INGLES  FRANCES</h3><br>";
            foreach ($_SESSION['pendientes']['palabras'] as $key => $value) {
                echo "{$value['espaniol']} {$value['ingles']} {$value['frances']}<br>";
            }

            // print_r($_SESSION['pendientes']);
            echo "<br><a href=\"accion.php?accion=Aniadir palabras\" >Seguir añadiendo palabras a pendientes<a>";
        } else {
            echo "<h2>NINGUNA PALABRA PUEDE QUEDAR VACIA</h2>";
            header('Refresh: 3; accion.php?accion=Aniadir palabras');
        }
    } else if ($_GET['aniadir'] == "Pendientes=>Diccionario") {

        if (empty($_SESSION['pendientes'])) {
            echo "No hay palabras en pendiente";
        } else {
            foreach ($_SESSION['pendientes']['palabras'] as $key => $value) {
                $espaniol = $value['espaniol'];
                $ingles = $value['ingles'];
                $frances = $value['frances'];

                $_SESSION['diccionario']['palabras'][] = [
                    "espaniol" => $espaniol,
                    "ingles" => $ingles,
                    "frances" => $frances
                ];
            }

            
            echo "<h1>Pendientes introducidas al diccionario,las palabras que tiene el diccionario son:</h1><br>";

            echo "<h3>ESPAÑOL  INGLES  FRANCES</h3><br>";
            foreach ($_SESSION['pendientes']['palabras'] as $key => $value) {
                echo "{$value['espaniol']} {$value['ingles']} {$value['frances']}<br>";
            }
            unset($_SESSION['pendientes']);
        }
        header('Refresh: 3; accion.php?accion=Aniadir palabras');
    }
}

if (isset($_GET['cancelar'])) {
    unset($_SESSION['pendientes']);
    echo "Pendientes destruidas, regresando a añadir palabras... ";
    header('Refresh: 3; accion.php?accion=Aniadir palabras');
}

?>