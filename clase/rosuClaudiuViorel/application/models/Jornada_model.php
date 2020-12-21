<?php
class Jornada_model extends CI_Model {

	function insert($numero, $fechaInicio, $fechaFin){

        if( $numero == null or $fechaInicio == null or $fechaFin == null ) {
            throw new Exception("El número, fecha inicio, fecha fin no pueden ser null.");
        }

        if ($this->getBeanByNumero($numero) != null ) {
            throw new Exception("El número es duplicado.");
        }

        if ($numero < 1 ) {
            throw new Exception("El número no puede ser menor de 1.");
        }

        $fechaInicioArray = explode('/',$fechaInicio);
        $fechaFinArray = explode('/',$fechaFin);

        $jornada = R::dispense('jornada');
        $jornada->numero = $numero;
        $jornada->ini = date('Y-m-d H:m:s',strtotime($fechaInicio));
        $jornada->fin = date('Y-m-d H:m:s',strtotime($fechaFin));
        R::store($jornada);

    }

    function getBeanByNumero($numero){
        return R::findOne('jornada','numero=?',[$numero]);
    }

    function getById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('jornada',$id);
    }

    function getAll(){
        return R::findAll('jornada');
    }

}

?>