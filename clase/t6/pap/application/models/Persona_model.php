<?php
class Persona_model extends CI_Model {

	function insert($nombre, $dni, $idPais, $idsAficiones=[]){
        $bean = R::dispense('persona');
        $bean->nombre = $nombre;
        $bean->dni = $dni;
        $bean->pais = R::load('pais',$idPais);

        foreach($idsAficiones as $id):
            $bean->sharedAficionList[] = R::load('aficion',$id);
        endforeach;

        R::store($bean);

        return true;
    }

    function update($id, $nombre, $dni, $idPais, $idsAficiones=[]){
        $bean = R::load('persona',$id);
        $bean->nombre = $nombre;
        $bean->dni = $dni;
        $bean->pais = R::load('pais',$idPais);
        $bean->sharedPersonaList = [];
        foreach($idsAficiones as $id):
            $bean->sharedAficionList[] = R::load('aficion',$id);
        endforeach;
        R::store($bean);

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