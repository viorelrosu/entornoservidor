<?php
class Boleto_model extends CI_Model {

	function insert($numero, $participacion, $idUser){

        if( $numero == null or $participacion == null or $idUser == null ) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if ($this->getByNumero($numero) != null ) {
            throw new Exception("El numero (".$numero.") es duplicado.");
        }

        if( $participacion < 1 ) {
            throw new Exception("La participación no puede ser menor de 1.");
        }

        $boleto = R::dispense('boleto');
        $boleto->numero = $numero;
        $boleto->participacion = $participacion;
        R::store($boleto);

        $user = R::load('user',$idUser);
        $user->xownBoletoList[] = $boleto;
        R::store($user);

    }

    function update($id, $numero, $participacion, $idUser){

        if( $id == null or $numero == null or $participacion == null or $idUser == null) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if ($this->getBeanByNumeroAndNotId($numero,$id) != null ) {
            throw new Exception("El número (". $numero .") es duplicado.");
        }

        if( $participacion < 1 ) {
            throw new Exception("La participación no puede ser menor de 1.");
        }

        $boleto = R::load('boleto',$id);
        $boleto->user = null;
        $boleto->numero = $numero;
        $boleto->participacion = $participacion;
        R::store($boleto);

        $user = R::load('user',$idUser);
        $user->xownBoletoList[] = $boleto;
        R::store($user);

    }

    function intercambio($id, $idUsuario, $participacion){

        if( $id == null or $idUsuario == null or $participacion == null) {
            throw new Exception("Los datos no pueden ser nulos.");
        }

        if( ($participacion < 1) or ($participacion > 15) ) {
            throw new Exception("La participación no puede ser menor de 1 y mayor de 15.");
        }

        $boleto = R::load('boleto',$id);
        $boleto->participacion -= $participacion;
        R::store($boleto);

        $intercambio = $this->getIntercambioByBoletoAndUsuarioId($id, $idUsuario);
        if($intercambio) {
            $intercambio->participacion += $participacion;
            R::store($intercambio);
        } else {
            $intercambio = R::dispense('intercambio');
            $intercambio->participacion = $participacion;
            R::store($intercambio);

            $boleto->xownIntercambioList[] = $intercambio;
            R::store($boleto);

            $user = R::load('user',$idUsuario);
            $user->xownIntercambioList[] = $intercambio;
            R::store($user);
        }

        return $intercambio;

    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('boleto',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('boleto',$id);
    }

    function getByNumero($numero){
        return R::findOne('boleto','numero=?',[$numero]);
    }

    function getBeanByNumeroAndNotId($numero,$id) {
        return R::findOne('boleto','numero=? and id <> ?', [$numero,$id]);
    }

    function getAllByUserId($userID){
        $user = R::load('user',$userID);
        return $user->ownBoletoList;
    }

    function getIntercambioByBoletoAndUsuarioId($id, $idUsuario){
        return R::findOne('intercambio','boleto_id=? and user_id = ?', [$id,$idUsuario]);
    }

    function getAll(){
        return R::findAll('boleto');
    }

    function getAllIntercambios(){
        return R::findAll('intercambio');
    }
}

?>