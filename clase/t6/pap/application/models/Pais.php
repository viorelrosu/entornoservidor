<?php
class Pais extends CI_Model {

	function insertarPais($nombreP){
        $pais = R::dispense('pais');
        $pais->nombre = $nombreP;
        $noExiste = (R::findOne('pais','nombre=?', [$nombreP]));
        $res = false;
        if($nombreP != null && $noExiste == null ) {
            R::store($pais);
            $res = true;
        }

        return $res;
    }

    function actualizarPais($id, $nombreP){
        $pais = R::load('pais',$id);
        $pais->nombre = $nombreP;
        $noExiste = (R::findOne('pais','nombre=?', [$nombreP]));
        $res = false;
        if($pais->id != 0 && $nombreP != null && $noExiste == null ) {
            R::store($pais);
            $res = true;
        }

        return $res;
    }

    function getPaisById($id){
        $pais = R::load('pais',$id);
        if($pais->id != 0) {
            $res = $pais;
        } else {
            $res = false;
        }

        return $res;
    }

    function deletePais($pais){
        $res = false;
        if(R::trash($pais)) {
            $res = true;
        }

        return $res;
    }

    function getPaises(){
        $paises = R::findAll('pais');
        return $paises;
    }
} 

?>