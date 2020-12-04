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

    function deleteById($id){
        R::trash(R::load('pais',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        return R::load('pais',$id);
    }

    function getBeanByNombre($nombre){
        return (R::findOne('pais', 'nombre=?', [$nombre]));
    }

    function getAll(){
        return R::findAll('pais');
    }
}

?>