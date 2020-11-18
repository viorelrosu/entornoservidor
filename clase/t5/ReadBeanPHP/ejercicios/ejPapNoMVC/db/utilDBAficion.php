<?php

    require_once 'rb.php';
    require_once 'db.php';

    function insertarA($nombre, $idsPersonas){
        $res = false;
        $noExiste = (R::findOne('aficion','nombre=?', [$nombre]));

        if($nombre != null && $noExiste == null ) {
            $bean = R::dispense('aficion');
            $bean->nombre = $nombre;
            foreach($idsPersonas as $id):
                $bean->sharedPersonaList[] = R::load('persona',$id);
            endforeach;
            R::store($bean);
            $res = true;
        }

        return $res;
    }

    function actualizarA($id, $nombre, $idsPersonas){
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

    function getAficionById($id){
        $bean = R::load('aficion',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function deleteAficionBean($bean){
        $res = false;
        if(R::trash($bean)) {
            $res = true;
        }

        return $res;
    }

    function getAllAficiones(){
        $rows = R::findAll('aficion');
        return $rows;
    }

    function getAllSinPersona() {
        $rows = R::find('aficion','persona_id is NULL');
        return $rows;
    }

    function aficionPersonasToIdsArray($aficion){
        $arraysIds = [];
        foreach($aficion->sharedPersonaList as $shared) {
            $arraysIds[] = $shared->id;
        }
        return $arraysIds;
    }

?>
