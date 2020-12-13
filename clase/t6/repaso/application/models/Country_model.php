<?php
class Country_model extends CI_Model {

	function insert($name){

        if( $name == null) {
            throw new Exception("El nombre no pueden ser null.");
        }

        if ($this->getBeanByName($name) != null ) {
            throw new Exception("El nombre es duplicado.");
        }

        $bean = R::dispense('country');
        $bean->name = $name;
        R::store($bean);

    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('country',$id);
    }

    function getBeanByNameAndNotId($name,$id) {
        return R::findOne('country','name=? and id <> ?', [$name,$id]);
    }

    function getBeanByName($name){
        return R::findOne('country','name=?',[$name]);
    }

    function getAll(){
        return R::findAll('country');
    }
}

?>