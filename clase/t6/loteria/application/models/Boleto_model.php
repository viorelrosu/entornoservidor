<?php
class Boleto_model extends CI_Model {

	function insert($numero, $cantidad, $idUser){

        if( $numero == null or $cantidad == null or $idUser == null ) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if ($this->getByNumero($numero) != null ) {
            throw new Exception("El numero (".$numero.") es duplicado.");
        }

        if( $cantidad < 1 ) {
            throw new Exception("La participación no puede ser menor de 1.");
        }

        $boleto = R::dispense('boleto');
        $boleto->numero = $numero;
        R::store($boleto);

        $participacion = R::dispense('participacion');
        $participacion->cantidad = $cantidad;
        $participacion->propietario = true;
        
        $user = R::load('user',$idUser);
        // $participacion->user = $user;

        // $participacion->boleto = $boleto;

        R::store($participacion);

        
        $user->xownParticipacionList[] = $participacion;
        R::store($user);

        $boleto->xownParticipacionList[] = $participacion;
        R::store($boleto);


    }

    function update($id, $numero, $cantidad, $idUser){

        if( $id == null or $numero == null or $cantidad == null or $idUser == null) {
            throw new Exception("Los datos no pueden ser null.");
        }

        if( $cantidad < 1 ) {
            throw new Exception("La participación no puede ser menor de 1.");
        }

        $participacion = R::load('participacion', $id);

        if ($this->getBeanByNumeroAndNotId($numero,$participacion->boleto_id) != null ) {
            throw new Exception("El número (". $numero .") es duplicado.");
        }

        $participacion->cantidad = $cantidad;
        $participacion->user = null;
        R::store($participacion);

        $boleto = R::load('boleto',$participacion->boleto_id);
        $boleto->numero = $numero;
        R::store($boleto);

        $user = R::load('user',$idUser);
        $user->xownParticipacionList[] = $participacion;
        R::store($user);
    }

    function intercambio($id, $idUsuario, $cantidad){

        if( $id == null or $idUsuario == null or $cantidad == null) {
            throw new Exception("Los datos no pueden ser nulos.");
        }

        if( ($cantidad < 1) or ($cantidad > 15) ) {
            throw new Exception("La participación no puede ser menor de 1 y mayor de 15.");
        }

        $participacion = R::load('participacion',$id);
        $participacion->cantidad -= $cantidad;
        R::store($participacion);

        $intercambio = $this->getIntercambioByBoletoAndUsuarioId($participacion->boleto_id, $idUsuario);
        if($intercambio) {
            $intercambio->cantidad += $cantidad;
            R::store($intercambio);
        } else {
            $intercambio = R::dispense('participacion');
            $intercambio->cantidad = $cantidad;
            $intercambio->propietario = false;
            R::store($intercambio);

            $boleto = R::load('boleto', $participacion->boleto_id);
            $boleto->xownParticipacionList[] = $intercambio;
            R::store($boleto);

            $user = R::load('user',$idUsuario);
            $user->xownParticipacionList[] = $intercambio;
            R::store($user);
        }

        return $intercambio;

    }

    function deleteBoletoById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('boleto',$id));
    }

    function deleteParticipacionesByUser($user){
        foreach($user->ownParticipacionList as $participacion) {
            if($participacion->propietario){
                $this->deleteBoletoById($participacion->boleto_id);
            } else {
                $this->deleteParticipacion($participacion);
            }
        }
    }

    function delete($bean){
        R::trash($bean);
    }
    function deleteParticipacion($participacion){

        $participacionPrincipal = R::findOne('participacion','propietario=1 and boleto_id = ?', [$participacion->boleto_id]);
        $participacionPrincipal->cantidad += $participacion->cantidad;
        R::store($participacionPrincipal);

        R::trash($participacion);
    }

    function getById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('boleto',$id);
    }

    function getParticipacionById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('participacion',$id);
    }

    function getByNumero($numero){
        return R::findOne('boleto','numero=?',[$numero]);
    }

    function getBeanByNumeroAndNotId($numero,$id) {
        return R::findOne('boleto','numero=? and id <> ?', [$numero,$id]);
    }

    function getAllParticipacionesByUserId($userID){
        $user = R::load('user',$userID);
        return $user->ownParticipacionList;
    }

    function getIntercambioByBoletoAndUsuarioId($id, $idUsuario){
        return R::findOne('participacion','boleto_id=? and user_id = ? and propietario = 0', [$id,$idUsuario]);
    }

    function getAll(){
        return R::findAll('boleto');
    }

    function getAllParticipaciones(){
        return R::findAll('participacion');
    }
}

?>