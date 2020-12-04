<?php
class Persona_model extends CI_Model {

	function insert($nombre, $dni, $idPaisNacimiento, $idsAficiones=[]){
        $bean = R::dispense('persona');
        $bean->nombre = $nombre;
        $bean->dni = $dni;
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

    }

    function deleteById($id){
        R::trash(R::load('persona',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        return R::load('persona',$id);
    }

    function getBeanByNombre($nombre){
        return  R::​findOne('persona','nombre=?',[$nombre]);
    }

    function getBeanByDni($dni){
        return R::findOne('persona','dni=?',[$dni]);
    }

    function getBeanByDniAndId($dni,$id) {
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