<?php
class Pais_model extends CI_Model {

	function insert($nombre){
        if( $nombre == null) {
            throw new Exception('El nombre del país no puede ser nulo.');
        }

        if($this->getBeanByNombre($nombre) != null ) {
            throw new Exception('Ya existe un país ('.$nombre.').');
        }

        $pais = R::dispense('pais');
        $pais->nombre = $nombre;
        R::store($pais);

        return $pais;
    }

    function update($id, $nombre){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        if( $nombre == null) {
            throw new Exception('El nombre del país no puede ser nulo.');
        }

        if($this->getBeanByNombreAndId($nombre, $id) != null ) {
            throw new Exception('Ya existe un país ('.$nombre.').');
        }

        $pais = R::load('pais',$id);
        $pais->nombre = $nombre;
        R::store($pais);
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('pais',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('pais',$id);
    }

    function getBeanByNombre($nombre){
        return (R::findOne('pais', 'nombre=?', [$nombre]));
    }

    function getBeanByNombreAndId($nombre,$id){
        return (R::findOne('pais','nombre=? and id <> ?', [$nombre,$id]));
    }

    function getAll(){
        return R::findAll('pais');
    }
}

?>