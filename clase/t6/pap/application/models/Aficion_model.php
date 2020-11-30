<?php
class Aficion_model extends CI_Model {

	function insert($nombre){
        $bean = R::dispense('aficion');
        R::store($bean);
        $res = true;

        return $res;
    }

    function update($id, $nombre, $idsPersonas){
        $noExiste = (R::findOne('aficion','nombre=? and id <> ?', [$nombre,$id]));
        $res = false;
        $bean = R::load('aficion',$id);

        if($bean->id != 0 && $nombre != null && $noExiste == null) {
            $bean->nombre = $nombre;
            $bean->sharedPersonaList = [];
            foreach($idsPersonas as $id):
                $bean->sharedPersonaList[] = R::load('persona',$id);
            endforeach;
            R::store($bean);
            $res = true;
        }

        return $res;
    }

    function delete($bean){
        $res = false;
        if(R::trash($bean)) {
            $res = true;
        }

        return $res;
    }

    function getBeanById($id){
        $bean = R::load('aficion',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function getBeanByNombre($nombre){
        return  R::​findOne​('aficion','nombre=?',[$nombre]);
    }

    function getAll(){
        $rows = R::findAll('aficion');
        return $rows;
    }

    function getAllSinPersona() {
        $rows = R::find('aficion','persona_id is NULL');
        return $rows;
    }

}

?>