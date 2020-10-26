<?php

class Persona {
		private $nombre;
		private $apellidos;
		public $dato;


		public function Persona() {
			$this->nombre = 'John';
			$this->apellidos = 'Doe';
		}

		/* o tb se puede de esta forma */
		
		public function __construct($nombre="John", $apellidos="Doe"){
		    $this->nombre = $nombre;
		    $this->apellidos = $apellidos;
		}

		/**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }
    
        /**
         * @return mixed
         */
        public function getApellidos()
        {
            return $this->apellidos;
        }
    
        /**
         * @return mixed
         */
        public function getDato()
        {
            return $this->dato;
        }
    
        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
    
        /**
         * @param mixed $apellidos
         */
        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }
    
        /**
         * @param mixed $dato
         */
        public function setDato($dato)
        {
            $this->dato = $dato;
        }
    
        public function hola($mensaje='Hola mundo'){
			echo $mensaje;
		}
		
		public function hola2($dato){
		    if( gettype($dato) == 'string' ) {
		        echo dato;
		    } else {
		        $sol = 2*$dato;
		        echo "El doble de $dato es $sol";
		    }
		   
		}
		
		public static function est1(){
		    echo "mi método estatico";
		}

		public function __toString() {
		    return $this->nombre .' '. $this->apellidos; 
		}
		
}

?>