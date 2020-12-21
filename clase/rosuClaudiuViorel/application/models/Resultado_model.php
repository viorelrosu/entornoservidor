<?php
class Resultado_model extends CI_Model {

	function insert($idJornada, $idEquipoLocal, $golesEquipoLocal, $idEquipoVisitante, $golesEquipoVisitante){

        if( $idJornada == null or $idEquipoLocal == null or $golesEquipoLocal == null or $idEquipoVisitante == null or $golesEquipoVisitante == null) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if($golesEquipoLocal < 0) {
             throw new Exception("Los goles no pueden ser negativos.");
        }

        if($golesEquipoVisitante < 0) {
             throw new Exception("Los goles no pueden ser negativos.");
        }

        $resultado = R::dispense('resultado');
        $resultado->gl = $golesEquipoLocal;
        $resultado->gv = $golesEquipoVisitante;
        R::store($resultado);

        $jornada = R::load('jornada',$idJornada);
        $jornada->xownResultadoList[] = $resultado;
        R::store($jornada);
       
        $equipoL = R::load('equipo',$idEquipoLocal);
        $equipoL->alias('local')->xownResultadoList[] = $resultado;
        R::store($equipoL);

        $equipoV = R::load('equipo',$idEquipoVisitante);
        $equipoV->alias('visitante')->xownResultadoList[] = $resultado;
        R::store($equipoV);

    }

    function getAll(){
        return R::findAll('resultado');
    }

 
}

?>