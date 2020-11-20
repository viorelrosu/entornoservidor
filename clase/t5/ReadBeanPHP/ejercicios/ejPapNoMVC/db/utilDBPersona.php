<?php

    require_once 'rb.php';
    require_once 'db.php';

    function insertar($nombreP, $dni, $idPais, $idPaisNacimiento, $idPaisResidencia, $idsAficiones=[], $idsAficionesGusta=[], $idsAficionesOdia=[]){
        $res = false;
        $noExiste = (R::findOne('persona','dni=?', [$dni]));

        if($nombreP != null && $dni != null && $noExiste == null ) {
            $bean = R::dispense('persona');
            $bean->nombre = $nombreP;
            $bean->dni = $dni;
            $bean->pais = R::load('pais',$idPais);
            $bean->pais_nacimiento = R::load('pais',$idPaisNacimiento);
            $bean->pais_residencia = R::load('pais',$idPaisResidencia);

            foreach($idsAficiones as $id):
                $bean->sharedAficionList[] = R::load('aficion',$id);
            endforeach;

            R::store($bean);

            foreach($idsAficionesGusta as $id):
                $gusta = R::dispense('gusta');
                $gusta->persona = $bean;
                $gusta->aficion = R::load('aficion',$id);
                R::store($gusta);
            endforeach;

            foreach($idsAficionesOdia as $id):
                $odio = R::dispense('odia');
                $odio->persona = $bean;
                $odio->aficion = R::load('aficion',$id);
                R::store($odio);
            endforeach;

            $res = true;
        }

        return $res;
    }

    function actualizar($id, $nombreP, $dni, $idPais, $idPaisNacimiento, $idPaisResidencia, $idsAficiones=[], $idsAficionesGusta=[], $idsAficionesOdia=[]){
        $noExiste = (R::findOne('persona','dni=? and id <> ?', [$dni,$id]));
        $res = false;
        $bean = R::load('persona',$id);

        if($bean->id != 0 && $nombreP != null && $dni != null && $idPais != null && $noExiste == null) {
            $bean->nombre = $nombreP;
            $bean->dni = $dni;
            $bean->pais = R::load('pais',$idPais);
            $bean->pais_nacimiento = R::load('pais',$idPaisNacimiento);
            $bean->pais_residencia = R::load('pais',$idPaisResidencia);
            $bean->sharedPersonaList = [];
            $bean->ownGustaList = [];
            $bean->ownOdiaList = [];
            foreach($idsAficiones as $id):
                $bean->sharedAficionList[] = R::load('aficion',$id);
            endforeach;
            R::store($bean);

            foreach($idsAficionesGusta as $id):
                $gusta = R::dispense('gusta');
                $gusta->persona = $bean;
                $gusta->aficion = R::load('aficion',$id);
                R::store($gusta);
            endforeach;

            foreach($idsAficionesOdia as $id):
                $odio = R::dispense('odia');
                $odio->persona = $bean;
                $odio->aficion = R::load('aficion',$id);
                R::store($odio);
            endforeach;

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

    function personaAficionesToIdsArray($persona,$arraysBeans=[]){
        $arraysIds = [];
        foreach($arraysBeans as $bean) {
            $arraysIds[] = $bean->id;
        }
        return $arraysIds;
    }

?>
