<?php

class Baza_model extends CI_Model {

	function insert($numero, $puntuaciones){

        if( $numero == null ) {
            throw new Exception("El número no puede ser null.");
        }

        if ($this->getBeanByNumero($numero) != null ) {
            throw new Exception("El número es duplicado.");
        }

        $baza = R::dispense('baza');
        $baza->numero = $numero;
        R::store($baza);

        foreach($puntuaciones as $item){
            $puntuacion = R::dispense('puntuacion');
            $puntuacion->jugador = $item['jugador'];
            $puntuacion->baza = $baza;
            $puntuacion->puntuacion = $item['puntuacion'];
            R::store($puntuacion);
        }

    }

    function getBeanByNumero($numero){
        return R::findOne('baza','numero=?',[$dni]);
    }

	function getAll(){
        return R::findAll('baza');
    }
}

?>