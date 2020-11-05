<?php

class Persona {

    private $nombre;

    private $apellido;

    private $dni;

    // public $dato;

    /*
     * public function Persona(){
     * $this->nombre;
     * $this->apellido; //este es el contructor personalizado
     * }
     */
    public function __construct($n = "nombre", $a = "apellido", $d = "dni")
    { // se le asigna valores por si se crea un objeto vacio
        $this->nombre = $n;
        $this->apellido = $a; // este es el contrcutor principal al que se llamará
        $this->dni = $d;
    }

    public function __toString()
    {
        return "[" . $this->nombre . ", " . $this->apellido . ", " . $this->dni . "]";
    }

    public static function miEstatico()
    {
        echo "metodo estatico"; // para acceder al metodo estatico no es con -> es con ::
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getDato()
    {
        return $this->dato;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setDato($dato)
    {
        $this->dato = $dato;
    }

    public function hola($dato)
    {
        if (gettype($dato) == "string") {
            echo "hola mundo";
        } else {
            $doble = $dato*2;
            echo "El doble de $dato es $doble";
        }
    }
}
?>