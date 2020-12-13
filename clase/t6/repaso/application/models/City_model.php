<?php
class City_model extends CI_Model {

	function insert($name,$idCountry){

        if( $name == null) {
            throw new Exception("El name no pueden ser null.");
        }

        if( $idCountry == null) {
            throw new Exception("El country no pueden ser null.");
        }

        if ($this->getBeanByName($name) != null ) {
            throw new Exception("El nombre es duplicado.");
        }

        $bean = R::dispense('city');
        $bean->name = $name;
        R::store($bean);

        $country = R::load('country',$idCountry);
        $country->xownCityList[] = $bean;
        R::store($country);

    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('city',$id);
    }

    function getBeanByNameAndNotId($name,$id) {
        return R::findOne('city','name=? and id <> ?', [$name,$id]);
    }

    function getBeanByName($name){
        return R::findOne('city','name=?',[$name]);
    }

    function getAll(){
        return R::findAll('city');
    }
}

?>