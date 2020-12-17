<?php

class Jugador_model extends CI_Model {

	function insert($nombre){

        if( $nombre == null ) {
            throw new Exception("El nombre no puede ser null.");
        }

        $bean = R::dispense('jugador');
        $bean->nombre = $nombre;
        R::store($bean);

    }

	function getAll(){
        return R::findAll('jugador');
    }
}

?>