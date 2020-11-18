<?php

    require_once 'rb.php';
    require_once 'db.php';

    function insertar($nombreP, $dni, $idPais, $idsAficiones=[]){
        $res = false;
        $noExiste = (R::findOne('persona','dni=?', [$dni]));

        if($nombreP != null && $dni != null && $noExiste == null ) {
            $bean = R::dispense('persona');
            $bean->nombre = $nombreP;
            $bean->dni = $dni;
            $bean->pais = R::load('pais',$idPais);
            foreach($idsAficiones as $id):
                $bean->sharedAficionList[] = R::load('aficion',$id);
            endforeach;
            R::store($bean);
            $res = true;
        }

        return $res;
    }

    function actualizar($id, $nombreP, $dni, $idPais, $idsAficiones=[]){
        $noExiste = (R::findOne('persona','dni=? and id <> ?', [$dni,$id]));
        $res = false;
        $bean = R::load('persona',$id);

        if($bean->id != 0 && $nombreP != null && $dni != null && $idPais != null && $noExiste == null) {
            $bean->nombre = $nombreP;
            $bean->dni = $dni;
            $bean->pais = R::load('pais',$idPais);
            foreach($idsAficiones as $id):
                $bean->sharedAficionList[] = R::load('aficion',$id);
            endforeach;
            R::store($bean);
            $res = true;
        }

        return $res;
    }

    function getById($id){
        $bean = R::load('persona',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function deleteBean($bean){
        $res = false;
        if(R::trash($bean)) {
            $res = true;
        }

        return $res;
    }

    function getAll(){
        $rows = R::findAll('persona');
        return $rows;
    }

    function getAllSinPais(){
        $rows = R::find('persona','pais_id is NULL');
        return $rows;
    }

    function personaAficionesToIdsArray($persona){
        $arraysIds = [];
        foreach($persona->sharedAficionList as $shared) {
            $arraysIds[] = $shared->id;
        }
        return $arraysIds;
    }

?>
