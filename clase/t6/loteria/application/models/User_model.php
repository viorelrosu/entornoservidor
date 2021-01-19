<?php
class User_model extends CI_Model {

	function insert($nombre, $email, $pass, $nombreRol='usuario'){

        if( $nombre == null or $email == null or $pass == null ) {
            throw new Exception("El nombre, email, contraseña no pueden ser null.");
        }

        if ($this->getBeanByEmail($email) != null ) {
            throw new Exception("El email es duplicado.");
        }

        $user = R::dispense('user');
        $user->nombre = $nombre;
        $user->email = $email;
        $user->password = password_hash($pass, PASSWORD_DEFAULT);

        $rol = R::findOne('rol','nombre=?',[$nombreRol]);

        if($rol == null) {
            $rol = R::dispense('rol');
            $rol->nombre = $nombreRol;
            R::store($rol);
        }

        $user->rol = $rol;
        R::store($user);

    }

    function update($id, $nombre, $email){

        if( $id == null or $nombre == null or $email == null) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if ($this->getBeanByEmailAndNotId($email,$id) != null ) {
            throw new Exception("El email es duplicado.");
        }

        $user = R::load('user',$id);
        $user->nombre = $nombre;
        $user->email = $email;
        R::store($user);

        return $user;

    }

    function login($email,$pass){
        $user = $this->getBeanByEmail($email);
        if($user == null) {
            throw new Exception("Usuario no existe");
        }
        $passHash = password_hash($pass);
        if(!password_verify($pass, $user->password) ) {
            throw new Exception("Password incorrecto");
        }

        return $user;
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('user',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('user',$id);
    }

    function getBeanByNombre($nombre){
        return R::​findOne('user','nombre=?',[$nombre]);
    }

    function getBeanByEmail($email){
        return R::findOne('user','email=?',[$email]);
    }

    function getBeanByRol($rolNombre){
        $sol = null;
        $rol = R::findOne('rol','nombre=?',[$rolNombre]);
        if($rol){
            $sol = R::findOne('user','rol_id=?',[$rol->id]);
        }
        return $sol;
    }

    function getBeanByEmailAndNotId($email,$id) {
        return R::findOne('user','email=? and id <> ?', [$email,$id]);
    }

    function getAllByRolAndNotId($nombreRol, $id){
        $rol = R::findOne('rol','nombre=?',[$nombreRol]);
        return R::findAll('user','rol_id = ? and id <> ?', [$rol->id, $id]);
    }

    function getAllByRol($nombreRol){
        $rol = R::findOne('rol','nombre=?',[$nombreRol]);
        return R::findAll('user','rol_id = ?', [$rol->id]);
    }

    function getAll(){
        return R::findAll('user');
    }

    function getAllRoles(){
        return R::findAll('rol');
    }
}

?>