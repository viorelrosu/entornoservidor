<?php
class Aficion_model extends CI_Model {

	function insert($nombre){
        $bean = R::dispense('aficion');
        $bean->nombre = $nombre;
        R::store($bean);

        return true;
    }

    function update($id, $nombre){
        $res = false;
        $bean = R::load('aficion',$id);
        $bean->nombre = $nombre;
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
        $bean = R::load('aficion',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function getBeanByNombre($nombre){
        return (R::findOne('aficion', 'nombre=?', [$nombre]));
    }

    function getBeanByNombreAndId($nombre,$id){
        return (R::findOne('aficion','nombre=? and id <> ?', [$nombre,$id]));
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