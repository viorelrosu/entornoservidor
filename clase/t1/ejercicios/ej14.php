<?php

function getMenuPrincipal(){
    
    echo <<<MENU
    
    Menu Principal: Elige una opción (1-3)
    =====
    1. Departamentos
    2. Empleados
    3. Salir del programa
    
    MENU;
    
}

function getMenuDepartamentos(){
    echo <<<MENU
    
    Menu Departamentos: Elige una opción (1-5)
    =====
    
    MENU;
    
    $opciones = [
        1 => 'Mostrar departamentos',
        2 => 'Mostrar departamento por id',
        3 => 'Dar de alta departamento',
        4 => 'Editar departamento',
        5 => 'Dar de baja departamento',
        6 => 'Volver al Menu principal'
    ];
    
    foreach($opciones as $clave => $menu) {
        echo $clave . ". " . $menu."\n";
    }
}

function getMenuEmpleados(){
    echo <<<MENU
    
    Menu Empleados: Elige una opción (1-5)
    =====
    
    MENU;
    
    $opciones = [
        1 => 'Mostrar empleados',
        2 => 'Mostrar empleado por id',
        3 => 'Dar de alta empleado',
        4 => 'Editar empleado',
        5 => 'Dar de baja empleado',
        6 => 'Volver al Menu principal'
    ];
    
    foreach($opciones as $clave => $menu) {
        echo $clave . ". " . $menu."\n";
    }
}

function mostrarDepartamentos(&$bd){
    
    echo <<<DEPT
    Listado Departamentos
    =====
    
    DEPT;
    
    foreach($bd['departamentos'] as $dept){
        echo "\n\n=========\n";
        echo "[".$dept['idDept'] ."] ".$dept['nombre'] ." ".$dept['descripcion']."\n";
        echo "=========\n";
    }
    echo "\n";
}

function mostrarEmpleados(&$bd){
    
    echo <<<DEPT
    Listado Empleados
    =====
    
    DEPT;
    
    foreach($bd['empleados'] as $empl){
        echo "\n\n=========\n";
        echo "[".$empl['idEmpleado']."]" .' '. $empl['nombre'] ." ".$empl['apellidos'].' ('.$bd['departamentos'][$empl['idDept']]['nombre'].')'."\n";
        echo "=========\n";
    }
    echo "\n";
}

function altaDepartamento(&$bd){
    
    echo <<<TITULO
    Dar de alta Departamento
    =====
    
    TITULO;
    
    $idDept = array_key_last($bd['departamentos'])+10;
    deptAltaEdit($idDept, $bd);
    
    echo "El departamento {$bd['departamentos'][$idDept]['nombre']} ha sido dado de alta correctamente";
    
    
}

function deptAltaEdit($id, &$bd){
    $nombre = '';
    $descr = '';
    echo "Introduce el nombre del Departamento";
    fscanf(STDIN, "%s\n", $nombre);
    
    echo "Introduce la descripción del Departamento";
    fscanf(STDIN, "%s\n", $descr);
    
    $bd['departamentos'][$id] = [
        'idDept'=>$id,
        'nombre' => $nombre,
        'descripcion' => $descr
    ];
    
    //print_r($bd['departamentos'][$id]);
    //print_r($bd);
    
}

function mostrarDepartamentoById(&$bd){
    
    echo <<<TITULO
    Mostrar Departamento por ID
    =====
    
    TITULO;
    
    mostrarDepartamentos($bd);
    $id=10;
    echo "Introduce el ID del Departamento";
    fscanf(STDIN, "%d\n", $id);
    
    echo $bd['departamentos'][$id]['idDept'] ." ".$bd['departamentos'][$id]['nombre'] ." ".$bd['departamentos'][$id]['descripcion']."\n";
    echo "\n";
}

function editDepartamento(&$bd){
    
    echo <<<TITULO
    Modificar Departamento por ID
    =====
    
    TITULO;
    
    mostrarDepartamentos($bd);
    $id=10;
    echo "Introduce el ID del Departamento que quieres modificar";
    fscanf(STDIN, "%d\n", $id);
    
    echo "Has elegido el departamento \n";
    echo "================\n";
    echo $bd['departamentos'][$id]['idDept'] ." ".$bd['departamentos'][$id]['nombre'] ." ".$bd['departamentos'][$id]['descripcion']."\n";
    echo "\n";
    
    
    deptAltaEdit($id, $bd);
    
    echo "El Departamento {$bd['departamentos'][$id]['nombre']} ha sido modificado correctamente";
    
}

function delDepartamento(&$bd){
    
    echo <<<TITULO
    Dar de baja Departamento por ID
    =====
    
    TITULO;
    
    mostrarDepartamentos($bd);
    $id=10;
    echo "Introduce el ID del Departamento que quieres dar de baja";
    fscanf(STDIN, "%d\n", $id);
    
    echo "Has elegido el departamento \n";
    echo "================\n";
    echo $bd['departamentos'][$id]['idDept'] ." ".$bd['departamentos'][$id]['nombre'] ." ".$bd['departamentos'][$id]['descripcion']."\n";
    echo "\n";
    $nombre = $bd['departamentos'][$id]['nombre'];
    
    $confirmar = 'N';
    echo "\n ¿Estas seguro de quierer dar de baja este departamento? S/N";
    fscanf(STDIN, "%s\n", $confirmar);
    
    if($confirmar == 'S') {
        unset($bd['departamentos'][$id]);
        echo "El Departamento $nombre ha sido dado de baja correctamente. \n";
    } else {
        echo "Operación cancelada";
    }
 
}


//EMPLEADOS =========================
function altaEmpleado(&$bd){
    
    echo <<<TITULO
    Dar de alta Empleado
    =====
    
    TITULO;
    
    $idEmpl = array_key_last($bd['empleados'])+100;
    emplAltaEdit($idEmpl, $bd);
    
    echo "El empleado {$bd['empleados'][$idEmpl]['nombre']} ha sido dado de alta correctamente";
    
    
}

function emplAltaEdit($id, &$bd){
    
    echo "\nNombre:";
    $nombre = readline();
    
    echo "Apellido:";
    $apellido = readline();
    
    echo "Id Dept:";
    $idDept = readline();
    
    $bd['empleados'][$id] = [
        'idEmpl'=>$id,
        'nombre' => $nombre,
        'apellidos' => $apellido,
        'idDept' => $idDept
    ];
}

function editEmpleado(&$bd){
    
    echo <<<TITULO
    
    Modificar Empleado por ID
    =====
    
    TITULO;
    
    mostrarEmpleados($bd);
    $id=10;
    echo "Introduce el ID del Empleado que quieres modificar";
    fscanf(STDIN, "%d\n", $id);
    
    echo "Has elegido el empleado \n";
    echo "================\n";
    echo $bd['empleados'][$id]['nombre'] ." ".$bd['empleados'][$id]['apellidos'] ." (".$bd['departamentos'][$bd['empleados'][$id]['idDept']]['nombre'].")\n";
    echo "\n";
    
    
    emplAltaEdit($id, $bd);
    
    echo "El Empleado {$bd['empleados'][$id]['nombre']} ha sido modificado correctamente";
    
}

function delEmpleado(&$bd){
    
    echo <<<TITULO
    
    Dar de baja Empleado por ID
    =====
    
    TITULO;
    
    mostrarEmpleados($bd);
    $id=10;
    echo "Introduce el ID del Empleado que quieres dar de baja";
    fscanf(STDIN, "%d\n", $id);
    
    echo "Has elegido el empleado \n";
    echo "================\n";
    echo "[".$bd['empleados'][$id]['idEmpleado'] ."] ".$bd['empleados'][$id]['nombre'] ." (".$bd['empleados'][$id]['apellidos'].$bd['departamentos'][$bd['empleados'][$id]['idDept']]['nombre'].")\n";
    echo "\n";
    $nombre = $bd['empleados'][$id]['nombre'];
    
    $confirmar = 'N';
    echo "\n ¿Estas seguro de quierer dar de baja este empleado? S/N";
    fscanf(STDIN, "%s\n", $confirmar);
    
    if($confirmar == 'S') {
        unset($bd['empleados'][$id]);
        echo "El Empleado $nombre ha sido dado de baja correctamente. \n";
    } else {
        echo "Operación cancelada";
    }
    
}

function ejecutarMenu(&$bd) {
    $isEnd = false;
    $isMenu = 0;
    $isSubmenu = 0;
    
    

while(!$isEnd) {
    switch($isMenu) {
        case 0:
            getMenuPrincipal();
            fscanf(STDIN, "%d\n", $isMenu);
            break;
        case 1:
            getMenuDepartamentos();
            fscanf(STDIN, "%d\n", $isSubmenu);
            $isMenu = 1;
            switch($isSubmenu){
                case 1:
                    //mostrar departamentos
                    mostrarDepartamentos($bd);
                    break;
                case 2:
                    //mostrar departamento by id
                    mostrarDepartamentoById($bd);
                    break;
                case 3:
                    //alta departamento
                    altaDepartamento($bd);
                    break;
                case 4:
                    //edit departamento
                    editDepartamento($bd);
                    break;
                case 5:
                    //delete departamento
                    delDepartamento($bd);
                    break;
                case 6:
                    //reset
                    $isMenu=0;
                    break;
                default:
                    //reset
                    $isMenu=0;
                    break;
            }
            break;
        case 2:
            getMenuEmpleados();
            fscanf(STDIN, "%d\n", $isSubmenu);
            $isMenu = 2;
            switch($isSubmenu){
                case 1:
                    //mostrar empleados
                    mostrarEmpleados($bd);
                    break;
                case 2:
                    //mostar empleado by id
                    mostrarEmpleadoById($bd);
                    break;
                case 3:
                    //alta empleado
                    altaEmpleado($bd);
                    break;
                case 4:
                    //edit empleado
                    editEmpleado($bd);
                    break;
                case 5:
                    //delete empleado
                    delEmpleado($bd);
                    break;
                case 6:
                    //reset
                    $isMenu = 0;
                    break;
                default:
                    //reset
                    $isMenu = 0;
                    break;
            }
            break;
        case 3: 
            echo "\nGracias. Fin del programa.";
            $isMenu = 0;
            $isSubmenu = 0;
            $isEnd = true;
            break;
        default:
            echo "\nIntroduce una opción válida";
            $isMenu = 0;
            break;
    }
}

}


$bd=[
    'departamentos' => [
        10 => [
            'idDept' => 10,
            'nombre' => 'Ventas',
            'descripcion' => 'Dpto. de Ventas'
        ],
    ],
    'empleados' => [
        100 => [
            'idEmpleado' => 100,
            'idDept' => 10,
            'nombre' => 'Pepe',
            'apellidos' => 'Sánchez',
        ],
        200 => [
            'idEmpleado' => 200,
            'idDept' => 10,
            'nombre' => 'Ana',
            'apellidos' => 'Garcia'
        ]
    ]
];

ejecutarMenu($bd);





