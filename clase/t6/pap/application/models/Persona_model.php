<?php
class Persona_model extends CI_Model {

	function insert($nombre, $dni, $pass, $idPaisNacimiento, $idsAficiones=[]){

        if( $nombre == null and $dni == null and $idPais == null and $idsAficiones == null) {
            throw new Exception("El nombre, dni, país y aficiones no pueden ser null.");
        }

        if ($this->getBeanByDni($dni) != null ) {
            throw new Exception("El dni es duplicado.");
        }

        $bean = R::dispense('persona');
        $bean->nombre = $nombre;
        $bean->dni = $dni;
        $bean->password = password_hash($pass, PASSWORD_DEFAULT);
        //$bean->pais_nacimiento = R::load('pais',$idPaisNacimiento);
        //$bean->pais = R::load('pais',$idPais);
        R::store($bean);

        $pais = R::load('pais',$idPaisNacimiento);
        $pais->alias('pais_nacimiento')->ownPersonaList[] = $bean;

        //para borrar en cascada
        //$pais->alias('pais_nacimiento')->xownPersonaList[] = $bean;
        R::store($pais);

        foreach($idsAficiones as $id):
            $gusta = R::dispense('gusta');
            $gusta->persona = $bean;
            $gusta->aficion = R::load('aficion',$id);
            R::store($gusta);
            //$bean->sharedAficionList[] = R::load('aficion',$id);
        endforeach;

    }

    function update($id, $nombre, $dni, $idPaisNacimiento, $idsAficiones=[]){

        if( $nombre == null and $dni == null and $idPais == null and $idsAficiones == null) {
            throw new Exception("El nombre, dni, país y aficiones no pueden ser null.");
        }

        if ($this->getBeanByDniAndNotId($dni,$id) != null ) {
            throw new Exception("El dni es duplicado.");
        }

        $persona = R::load('persona',$id);
        $persona->nombre = $nombre;
        $persona->dni = $dni;
        $persona->pais_nacimiento = null;
        R::store($persona);

        //asociamos el pais
        $pais = R::load('pais',$idPaisNacimiento);
        $pais->alias('pais_nacimiento')->xownPersonaList[] = $persona;
        R::store($pais);
        //para desasociar el pais la version larga
        //unset( $persona->fetchAs('pais')->pais_nacimiento->alias('pais_nacimiento')->xownPersonaList[$persona->id]);
        // $bean->sharedPersonaList = [];
        // foreach($idsAficiones as $id):
        //     $bean->sharedAficionList[] = R::load('aficion',$id);
        // endforeach;

        $idAficionComunes = [];
        //quitamos las aficiones que ya no están
        foreach($persona->ownGustaList as $gustoActual) :
            if(in_array($gustoActual->aficion->id,$idsAficiones)) {
               //gustos que tengo que seguir teniendo
                $idAficionComunes[] = $gustoActual->aficion->id;
            } else {
                R::store($persona); //parche
                R::trash($gustoActual);
            }
        endforeach;

        //añadimos las aficiones nuevas
        foreach($idsAficiones as $idAficionNueva):
            if(!in_array($idAficionNueva,$idAficionComunes)) {
                $gusta = R::dispense('gusta');
                $gusta->persona = $persona;
                $gusta->aficion = R::load('aficion',$idAficionNueva);
                R::store($persona); //parche
                R::store($gusta);
            }
        endforeach;

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