<?php
class Premio_model extends CI_Model {

	function insert($numero, $idTipo){
        if( $numero == null ) {
            throw new Exception('El número no puede ser nulo.');
        }

        if( $idTipo == null ) {
            throw new Exception('El tipo de premio no puede ser nulo.');
        }

        if( $numero < 1 ) {
            throw new Exception('El número no puede ser menor de 1.');
        }


        if($this->getByNumero($numero) != null ) {
            throw new Exception('El número ('.$numero.') es duplicado.');
        }

        $premio = R::dispense('premio');
        $premio->numero = $numero;
        R::store($premio);

        $tipo = R::load('tipo',$idTipo);
        $tipo->xownPremioList[] = $premio;
        R::store($tipo);
    }

    function update($id, $numero, $idTipo){

        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        if( $numero == null) {
            throw new Exception('El numero no puede ser nulo.');
        }

        if($this->getBeanByNumeroAndId($numero, $id) != null ) {
            throw new Exception('El número ('.$numero.') es duplicado.');
        }

        $premio = R::load('premio',$id);
        $premio->numero = $numero;
        $premio->tipo = null;
        R::store($premio);

        $tipo = R::load('tipo',$idTipo);
        $tipo->xownPremioList[] = $premio;
        R::store($tipo);
    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }

        R::trash(R::load('premio',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('premio',$id);
    }

    function getByNumero($numero){
        return (R::findOne('premio', 'numero=?', [$numero]));
    }

    function getBeanByNumeroAndId($numero,$id){
        return (R::findOne('numero','numero=? and id <> ?', [$numero,$id]));
    }

    function getAll(){
        return R::findAll('premio');
    }

}

?>