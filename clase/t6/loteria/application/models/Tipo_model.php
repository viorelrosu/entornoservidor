<?php
class Tipo_model extends CI_Model {

	function insert($nombre, $multiplicador){
        if( $nombre == null or $multiplicador == null) {
            throw new Exception('Los datos no pueden ser nulos.');
        }

        if($multiplicador < 1) {
            throw new Exception('El multiplicador no puede ser menor de 1.');
        }

        if($this->getByNombre($nombre) != null ) {
            throw new Exception('El nombre ('.$nombre.') es duplicado.');
        }

        $tipo = R::dispense('tipo');
        $tipo->nombre = $nombre;
        $tipo->multiplicador = $multiplicador;
        R::store($tipo);

        return true;
    }

    function update($id, $nombre, $multiplicador){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        if( $nombre == null or $multiplicador == null ) {
            throw new Exception('Los datos no pueden ser nulos.');
        }

        if($this->getByNombreAndId($nombre, $id) != null ) {
            throw new Exception('Ya existe un país ('.$nombre.').');
        }

        $tipo = R::load('tipo',$id);
        $tipo->nombre = $nombre;
        $tipo->multiplicador = $multiplicador;
        R::store($tipo);
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('tipo',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('tipo',$id);
    }

    function getByNombre($nombre){
        return (R::findOne('tipo', 'nombre=?', [$nombre]));
    }

    function getByNombreAndId($nombre,$id){
        return (R::findOne('tipo','nombre=? and id <> ?', [$nombre,$id]));
    }

    function getAll(){
        return R::findAll('tipo');
    }
}

?>