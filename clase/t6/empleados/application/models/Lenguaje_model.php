<?php
class Lenguaje_model extends CI_Model {

	function insert($nombre){
        if( $nombre == null) {
            throw new Exception('El nombre no puede ser nulo.');
        }

        if($this->getBeanByNombre($nombre) != null ) {
            throw new Exception('Ya existe un lenguaje de programación ('.$nombre.').');
        }

        $lenguaje = R::dispense('lenguaje');
        $lenguaje->nombre = $nombre;
        R::store($lenguaje);

        return true;
    }

    function getBeanByNombre($nombre){
        return (R::findOne('lenguaje', 'nombre=?', [$nombre]));
    }

    function getAll(){
        return R::findAll('lenguaje');
    }
}

?>