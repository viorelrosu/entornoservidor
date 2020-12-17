<?php
class Empleado_model extends CI_Model {

	function insert($nombre, $apellidos, $telefono, $idCiudadNacimiento, $idsLenguajes=[]){

        if( $nombre == null and $apellidos == null and $telefono == null  and $idCiudadNacimiento == null and $idsLenguajes == null) {
            throw new Exception("El nombre, apellidos, teléfono, ciudad y lenguajes no pueden ser null.");
        }

        if ($this->getBeanByNombre($nombre) != null ) {
            throw new Exception("El nombre de empleado es duplicado.");
        }

        $empleado = R::dispense('empleado');
        $empleado->nombre = $nombre;
        $empleado->apellidos = $apellidos;
        $empleado->telefono = $telefono;
        R::store($empleado);

        $ciudad = R::load('ciudad',$idCiudadNacimiento);
        $ciudad->alias('ciudad_nacimiento')->xownEmpleadoList[] = $empleado;
        R::store($ciudad);

        foreach($idsLenguajes as $id):
            $domina = R::dispense('domina');
            $domina->empleado= $empleado;
            $domina->lenguaje = R::load('lenguaje',$id);
            R::store($domina);
        endforeach;

    }

    function update($id, $nombre, $apellidos, $telefono, $idCiudadNacimiento, $idsLenguajes=[]){

        if( $id == null and $nombre == null and $apellidos == null and $telefono == null  and $idCiudadNacimiento == null and $idsLenguajes == null) {
            throw new Exception("El nombre, apellidos, teléfono, ciudad y lenguajes no pueden ser null.");
        }

        if ($this->getBeanByNombreAndNotId($nombre,$id) != null ) {
            throw new Exception("El nombre es duplicado.");
        }

        $empleado = R::load('empleado',$id);
        $empleado->nombre = $nombre;
        $empleado->apellidos = $apellidos;
        $empleado->telefono = $telefono;
        $empleado->ciudad_nacimiento = null;
        R::store($empleado);

        //asociamos el pais
        $ciudad = R::load('ciudad',$idCiudadNacimiento);
        $ciudad->alias('ciudad_nacimiento')->xownEmpleadoList[] = $empleado;
        R::store($ciudad);

        $idLenguajesComunes = [];
        foreach($empleado->ownDominaList as $dominaActual) :
            if(in_array($dominaActual->lenguaje->id,$idsLenguajes)) {
                $idLenguajesComunes[] = $dominaActual->lenguaje->id;
            } else {
                R::store($empleado);
                R::trash($dominaActual);
            }
        endforeach;

        foreach($idsLenguajes as $idLenguajeNuevo):
            if(!in_array($idLenguajeNuevo,$idLenguajesComunes)) {
                $domina = R::dispense('domina');
                $domina->empleado = $empleado;
                $domina->lenguaje = R::load('lenguaje',$idLenguajeNuevo);
                R::store($empleado);
                R::store($domina);
            }
        endforeach;

    }

    function deleteById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        R::trash(R::load('empleado',$id));
    }

    function delete($bean){
        R::trash($bean);
    }

    function getBeanById($id){
        if( $id == null) {
            throw new Exception('No se han podido cargar los datos.');
        }
        return R::load('empleado',$id);
    }

    function getBeanByNombre($nombre){
        return R::findOne('empleado','nombre=?',[$nombre]);
    }

    function getBeanByNombreAndNotId($nombre,$id) {
        return R::findOne('empleado','nombre=? and id <> ?', [$nombre,$id]);
    }

    function getAll(){
        return R::findAll('empleado');
    }
}

?>