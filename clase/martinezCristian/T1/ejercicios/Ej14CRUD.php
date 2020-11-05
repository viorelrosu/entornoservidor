<?php
$opcion = 1;
$bd = [];
$bdEm = [];
$flag = true;

function mostrarMenu()
{
    echo "\n=======================\n";
    echo "ZONA DEPARTAMENTO\n";
    echo "=======================\n";
    echo "1. Creación departamento\n";
    echo "2. Modificación departamento\n";
    echo "3. Borrar departamento\n";
    echo "4. Listado departamento\n";
    echo "\n=======================\n";
    echo "ZONA EMPLEADOS\n";
    echo "=======================\n";
    echo "5. Creación empleado\n";
    echo "6. Modificación empleado\n";
    echo "7. Borrar empleado\n";
    echo "8. Listado empleado\n";
    echo "\n=======================\n";
    echo "0. Salir del Programa \n";
    echo "=======================\n";
}

function crearDep(&$bd)
{
    echo "Introduce ID:";
    $id = readline();

    echo "Introduce nombre departamento:";
    $nombre = readline();

    echo "Introduce descripción:";
    $desc = readline();

    $bd["departamento"][$id] = [
        "nombre" => $nombre,
        "descripcion" => $desc
    ];
}

function mostrarDep(&$bd)
{
    foreach ($bd["departamento"] as $id => $dep) {
        echo "[$id]{$dep["nombre"]} - {$dep["descripcion"]}\n";
    }

    echo "\n\n";
}

function borrarDep(&$bd)
{
    echo "Seleccione el departamento que quiere borrar\n";

    mostrarDep($bd);

    $num = readline();

    foreach ($bd['departamento'] as $id => $dep) {
        if ($num == $id) {
            unset($bd['departamento'][$id]);
        }
    }

    ;
}

function modificarDep(&$bd)
{
    echo "Seleccione el departamento que quiere modificar:\n";

    mostrarDep($bd);

    $num = readline();
    foreach ($bd['departamento'] as $id => $dep) {
        if ($num == $id) {

            echo "Introduce nombre departamento:";
            $nombre = readline();

            echo "Introduce descripción:";
            $desc = readline();

            $bd["departamento"][$id] = [
                "nombre" => $nombre,
                "descripcion" => $desc
            ];
        }
    }

    ;
}

function crearEmpleado(&$bd)
{
    echo "Introduzca id empleado: ";
    $idE = readline();
    echo "introduzca nombre empleado: ";
    $nombre = readline();
    echo "Introduzca apellido: ";
    $apellido = readline();
    echo "Introduzca departamento asociado:\n ";
    mostrarDep($bd);
    $sel = readline();

    $bd['empleado'][$idE] = [
        "nombre" => $nombre,
        "apellido" => $apellido,
        "departamento" => $sel
    ];

    ;
}

function mostrarEmpleados(&$bd)
{
    foreach ($bd['empleado'] as $id => $datos) {
        foreach ($bd['departamento'] as $id2 => $datos2) {
            echo "Id empleado:$id  Nombre:{$datos['nombre']} Apellido:{$datos['apellido']} Id Dpto:{$datos['departamento']} Nombre dpto:{$datos2['nombre']} Descripcion Dpto: {$datos2['descripcion']}\n";
        }
    }

    ;
}

function borrarEmplead(&$bd) {
    
    echo "Seleccione el empleado que quiere borrar:\n ";
    
    mostrarEmpleados($bd);
    
    $num = readline();
    
    foreach ($bd['empleado'] as $id=>$datos){
        if($num == $id){
            unset($bd['empleado'][$id]);
        }
    }
        
    
    ;
}

function modificarEmpleado(&$bd) {
    
    echo "Seleccione el empleado a modificar:\n ";
    mostrarEmpleados($bd);
    $id = readline();
    
    foreach ($bd['empleado'] as $k=>$v){
        if ($id == $k){
            echo "Introduzca el nuevo nombre: ";
            $nombre = readline();
            echo "Introduzca el nuevo apellido: ";
            $apellido = readline();
            echo "Introduzca el nuevo departamento ";
            mostrarDep($bd);
            $dpto = readline();
            $bd['empleado'][$id] = [
                "nombre" => $nombre,
                "apellido" => $apellido,
                "departamento" => $dpto
            ];
        }
    }
    ;
}
do {

    mostrarMenu();

    echo "\nSeleccione una opción:\n";
    fscanf(STDIN, "%d\n", $opcion);

    switch ($opcion) {
        case 1:
            crearDep($bd);
            break;
        case 2:
            modificarDep($bd);
            break;
        case 3:
            borrarDep($bd);
            break;
        case 4:
            mostrarDep($bd);
            break;
        case 5:
            crearEmpleado($bd);
            break;
        case 6:
            modificarEmpleado($bd);
            break;
        case 7:
            borrarEmplead($bd);
            break;
        case 8:
            mostrarEmpleados($bd);
            break;
        case 0:
            echo "gracias por usar el programa";
            $flag = false;
    }
} while ($flag);

?>
