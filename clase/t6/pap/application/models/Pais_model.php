<?php
class Pais_model extends CI_Model {

	function insert($nombre){
        $pais = R::dispense('pais');
        $pais->nombre = $nombre;
        R::store($pais);

        return true;
    }

    function update($id, $nombre){
        $pais = R::load('pais',$id);
        $pais->nombre = $nombre;
        R::store($pais);

        return true;
    }

    function delete($pais){
        $res = false;
        if(R::trash($pais)) {
            $res = true;
        }

        return $res;
    }

    function getBeanById($id){
        $pais = R::load('pais',$id);
        if($pais->id != 0) {
            $res = $pais;
        } else {
            $res = false;
        }

        return $res;
    }

    function getBeanByNombre($nombre){
        return (R::findOne('pais', 'nombre=?', [$nombre]));
    }

    function getAll(){
        $paises = R::findAll('pais');
        return $paises;
    }
}

?>