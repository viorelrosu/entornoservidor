<?php
class Ciudad_model extends CI_Model {

	function insert($nombre){
        if( $nombre == null) {
            throw new Exception('El nombre no puede ser nulo.');
        }

        if($this->getBeanByNombre($nombre) != null ) {
            throw new Exception('Ya existe un lenguaje de programación ('.$nombre.').');
        }

        $ciudad = R::dispense('ciudad');
        $ciudad->nombre = $nombre;
        R::store($ciudad);

        return true;
    }

    function getBeanByNombre($nombre){
        return (R::findOne('ciudad', 'nombre=?', [$nombre]));
    }

    function getAll(){
        return R::findAll('ciudad');
    }
}

?>