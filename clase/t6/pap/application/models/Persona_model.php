<?php
class Persona_model extends CI_Model {

	function insert($nombreP, $dni, $idPais, $idsAficiones=[]){
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

    function update($id, $nombreP, $dni, $idPais, $idsAficiones=[]){
        $noExiste = (R::findOne('persona','dni=? and id <> ?', [$dni,$id]));
        $res = false;
        $bean = R::load('persona',$id);

        if($bean->id != 0 && $nombreP != null && $dni != null && $idPais != null && $noExiste == null) {
            $bean->nombre = $nombreP;
            $bean->dni = $dni;
            $bean->pais = R::load('pais',$idPais);
            $bean->sharedPersonaList = [];
            foreach($idsAficiones as $id):
                $bean->sharedAficionList[] = R::load('aficion',$id);
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
        $bean = R::load('persona',$id);
        if($bean->id != 0) {
            $res = $bean;
        } else {
            $res = false;
        }

        return $res;
    }

    function getBeanByNombre($nombre){
        return  R::​findOne​('persona','nombre=?',[$nombre]);
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