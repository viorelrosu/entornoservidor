<?php
class Aficion_model extends CI_Model {

	function insert($nombre){
        if( $nombre == null) {
            throw new Exception('EL nombre de la afición no puede ser nulo.');
        }

        if($this->getBeanByNombre($nombre) != null ) {
            throw new Exception('Ya existe una afición ('.$nombre.').');
        }

        $bean = R::dispense('aficion');
        $bean->nombre = $nombre;
        R::store($bean);
    }

    function update($id, $nombre){

        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        if( $nombre == null) {
            throw new Exception('El nombre de la afición no puede ser nulo.');
        }

        if($this->getBeanByNombreAndId($nombre, $id) != null ) {
            throw new Exception('Ya existe una afición ('.$nombre.').');
        }

        $bean = R::load('aficion',$id);
        $bean->nombre = $nombre;
        R::store($bean);
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        R::trash(R::load('aficion',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('aficion',$id);
    }

    function getBeanByNombre($nombre){
        return (R::findOne('aficion', 'nombre=?', [$nombre]));
    }

    function getBeanByNombreAndId($nombre,$id){
        return (R::findOne('aficion','nombre=? and id <> ?', [$nombre,$id]));
    }

    function getAll(){
        return R::findAll('aficion');
    }

    function getAllSinPersona() {
        return R::find('aficion','persona_id is NULL');
    }

}

?>