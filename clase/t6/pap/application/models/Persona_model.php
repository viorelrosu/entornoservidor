<?php
class Persona_model extends CI_Model {

	function insert($nombre, $dni, $idPaisNacimiento, $idsAficiones=[]){
        $bean = R::dispense('persona');
        $bean->nombre = $nombre;
        $bean->dni = $dni;
        $bean->pais_nacimiento = R::load('pais',$idPaisNacimiento);
        //$bean->pais = R::load('pais',$idPais);

        R::store($bean);

        foreach($idsAficiones as $id):
            $gusta = R::dispense('gusta');
            $gusta->persona = $bean;
            $gusta->aficion = R::load('aficion',$id);
            R::store($gusta);
            //$bean->sharedAficionList[] = R::load('aficion',$id);
        endforeach;

        return true;
    }

    function update($id, $nombre, $dni, $idPaisNacimiento, $idsAficiones=[]){
        $bean = R::load('persona',$id);
        $bean->nombre = $nombre;
        $bean->dni = $dni;
        // $bean->pais = R::load('pais',$idPais);
        $bean->pais_nacimiento = R::load('pais',$idPaisNacimiento);
        // $bean->sharedPersonaList = [];
        // foreach($idsAficiones as $id):
        //     $bean->sharedAficionList[] = R::load('aficion',$id);
        // endforeach;

        R::store($bean);

        foreach($idsAficiones as $id):
                $gusta = R::dispense('gusta');
                $gusta->persona = $bean;
                $gusta->aficion = R::load('aficion',$id);
                R::store($gusta);
        endforeach;

        R::store($gusta);

        return true;
    }

    function delete($bean){
        $res = false;
        if(R::trash($bean)) {
            $res = true;
        }

        return $res;
    }

    function getBeanById($id){
        $bean = R::load('persona',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function getBeanByNombre($nombre){
        return  R::​findOne('persona','nombre=?',[$nombre]);
    }

    function getBeanByDni($dni){
        return R::findOne('persona','dni=?',[$dni]);
    }

    function getBeanByDniAndId($dni,$id) {
        return (R::findOne('persona','dni=? and id <> ?', [$dni,$id]));
    }

    function getAll(){
        $rows = R::findAll('persona');
        return $rows;
    }

    function getAllSinPais(){
        $rows = R::find('persona','pais_id is NULL');
        return $rows;
    }
}

?>