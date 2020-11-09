
<?php
$arr = [
    'Andalucia' => [
        'Almería',
        'Cádiz',
        'Córdoba',
        'Granada',
        'Huelva',
        'Jaén',
        'Málaga',
        'Sevilla'
    ],
    'Aragon' => [
        'Huesca',
        'Teruel',
        'Zaragoza'
    ],
    'Asturias (Principado de)' => [
        'Asturias'
    ],
    'Canarias' => [
        'Palmas (Las)',
        'Santa Cruz de Tenerife'
    ],
    'Cantabria' => [
        'Cantabria'
    ],
    'Castilla y Leon' => [
        'Ávila',
        'Burgos',
        'León',
        'Palencia',
        'Salamanca',
        'Segovia',
        'Soria',
        'Valladolid',
        'Zamora'
    ],
    'Castilla-La Mancha' => [
        'Albacete',
        'Ciudad Real',
        'Cuenca',
        'Guadalajara',
        'Toledo'
    ],
    'Catalunia' => [
        'Barcelona',
        'Gerona',
        'Lérida',
        'Tarragona'
    ],
    'Ceuta (Ciudad de)' => [
        'Ceuta'
    ],
    'Comunidad Valenciana' => [
        'Alicante',
        'Castellón',
        'Valencia'
    ],
    'Extremadura' => [
        'Badajoz',
        'Cáceres'
    ],
    'Galicia' => [
        'Coruña (La)',
        'Lugo',
        'Orense',
        'Pontevedra'
    ],
    'Islas Baleares' => [
        'Islas Baleares'
    ],
    'Madrid (Comunidad de)' => [
        'Madrid'
    ],
    'Melilla (Ciudad de)' => [
        'Melilla'
    ],
    'Murcia (Región de)' => [
        'Murcia'
    ],
    'Navarra (Comunidad Foral de)' => [
        'Navarra'
    ],
    'País Vasco' => [
        'Álava',
        'Guipúzcoa',
        'Vizcaya'
    ],
    'Rioja (La)' => [
        'Rioja (La)'
    ]
];


$resultado = "";
$valor = $_GET['ccaa'];

if (isset($_GET['ccaa'])) {

    $resultado = "";

    $resultado .= "Provincias: <select id=\"provAnd\" name=\"provAnd\">";
    foreach ($arr[$valor] as $v) {
        $resultado .= "<option value=\"$v\">$v</option>";
        // echo $v;
    }
    $resultado .= "</select><br/>";
    echo $resultado;

}
?>