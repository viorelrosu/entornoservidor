<?php
class User_model extends CI_Model {

	function insert($dni,$name,$idCity){

        if( $dni == null && $name == null && $idCity == null ) {
            throw new Exception("El dni, name y city no pueden ser null.");
        }

        if ($this->getBeanByDni($dni) != null ) {
            throw new Exception("El dni es duplicado.");
        }

        $bean = R::dispense('user');
        $bean->dni = $dni;
        $bean->name = $name;
        R::store($bean);

        $city = R::load('city',$idCity);
        $city->alias('born')->xownUserList[] = $bean;
        R::store($city);

    }

    function insertTravel($idUser,$idsCity) {
        if( $idUser == null && $idsCity == null ) {
            throw new Exception("El user y el city no pueden ser null.");
        }

        $user = $this->getBeanById($idUser);

        foreach($idsCity as $idCity) {
            $travel = R::dispense('travel');
            $travel->user = $user;
            $travel->city = R::load('city',$idCity);
            R::store($travel);
        }

    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('user',$id);
    }

    function getBeanByDniAndNotId($dni,$id) {
        return R::findOne('user','dni=? and id <> ?', [$name,$id]);
    }

    function getBeanByDni($dni){
        return R::findOne('user','dni=?',[$dni]);
    }

    function getAll(){
        return R::findAll('user');
    }
}

?>