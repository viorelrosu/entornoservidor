<?php
class Aficion_model extends CI_Model {

	function insert($nombre){
        $bean = R::dispense('aficion');
        $bean->nombre = $nombre;
        R::store($bean);
    }

    function update($id, $nombre){
        $res = false;
        $bean = R::load('aficion',$id);
        $bean->nombre = $nombre;
        R::store($bean);
    }

    function deleteById($id){
        R::trash(R::load('aficion',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        return R::load('aficion',$id);
    }

    function getBeanByNombre($nombre){
        return (R::findOne('aficion', 'nombre=?', [$nombre]));
    }

    function getBeanByNombreAndId($nombre,$id){
        return (R::findOne('aficion','nombre=? and id <> ?', [$nombre,$id]));
    }

    function getAll(){
        return R::findAll('aficion');
    }

    function getAllSinPersona() {
        return R::find('aficion','persona_id is NULL');
    }

}

?>