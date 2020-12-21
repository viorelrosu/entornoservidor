<?php
class Equipo_model extends CI_Model {

	function insert($nombre){

        if( $nombre == null) {
            throw new Exception("El nombre no puede ser null.");
        }

        if ($this->getBeanByNombre($nombre) != null ) {
            throw new Exception("El nombre es duplicado.");
        }

        $equipo = R::dispense('equipo');
        $equipo->nombre = $nombre;
        R::store($equipo);

    }

    function getBeanByNombre($nombre){
        return R::findOne('equipo','nombre=?',[$nombre]);
    }

    function getAll(){
        return R::findAll('equipo');
    }

}

?>