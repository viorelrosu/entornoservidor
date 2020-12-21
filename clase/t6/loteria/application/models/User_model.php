<?php
class User_model extends CI_Model {

	function insert($nombre, $dni, $pass){

        if( $nombre == null or $dni == null or $pass == null ) {
            throw new Exception("El nombre, dni, contraseña no pueden ser null.");
        }

        if ($this->getBeanByDni($dni) != null ) {
            throw new Exception("El dni es duplicado.");
        }

        $user = R::dispense('user');
        $user->nombre = $nombre;
        $user->dni = $dni;
        $user->password = password_hash($pass, PASSWORD_DEFAULT);
        R::store($user);

    }

    function update($id, $nombre, $dni){

        if( $id == null or $nombre == null or $dni == null) {
            throw new Exception("El nombre, dni no pueden ser null.");
        }

        if ($this->getBeanByDniAndNotId($dni,$id) != null ) {
            throw new Exception("El dni es duplicado.");
        }

        $user = R::load('user',$id);
        $user->nombre = $nombre;
        $user->dni = $dni;
        R::store($user);

    }

     function login($dni,$pass){
        $persona = $this->getBeanByDni($dni);
        if($persona == null) {
            throw new Exception("Usuario no existe");
        }
        $passHash = password_hash($pass);
        if(!password_verify($pass, $persona->password) ) {
            throw new Exception("Password incorrecto");
        }

        return $persona;
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('persona',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('persona',$id);
    }

    function getBeanByNombre($nombre){
        return  R::​findOne('persona','nombre=?',[$nombre]);
    }

    function getBeanByDni($dni){
        return R::findOne('persona','dni=?',[$dni]);
    }

    function getBeanByDniAndNotId($dni,$id) {
        return R::findOne('persona','dni=? and id <> ?', [$dni,$id]);
    }

    function getAll(){
        return R::findAll('persona');
    }

    function getAllSinPais(){
        return R::find('persona','pais_id is NULL');
    }
}

?>