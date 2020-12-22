<?php

	class Init_model extends CI_MOdel {

		function iniciar_db() {
			$this->insertRoles('admin');
			$this->insertRoles('usuario');
			$this->insertUser('admin','admin','admin@loteria.com','admin');
			$this->insertUser('usuario','mama','mama@loteria.com','mama');
			$this->insertUser('usuario','papa','papa@loteria.com','papa');
			$this->insertUser('usuario','primo','primo@loteria.com','primo');
			$this->insertTiposPremio('El Gordo (primer premio)', 20000);
			$this->insertTiposPremio('Segundo premio', 6250);
			$this->insertTiposPremio('Tercer premio', 2500);
			$this->insertTiposPremio('Cuartos premios', 1000);
			$this->insertTiposPremio('Quintos premios', 300);
			$this->insertTiposPremio('Pedreas de 5 cifras', 5);
		}

		function insertRoles($nombreRol) {
			$rol = R::dispense('rol');
            $rol->nombre = $nombreRol;
            R::store($rol);
		}

		function insertUser($rolNombre, $nombre, $email, $pass){
			$rol = R::findOne('rol','nombre=?',[$rolNombre]);

			$user = R::dispense('user');
        	$user->nombre = $nombre;
        	$user->email = $email;
        	$user->password = password_hash($pass, PASSWORD_DEFAULT);
        	$user->rol = $rol;
        	R::store($user);
		}

		function insertTiposPremio($nombre,$multiplicador) {
			$tipo = R::dispense('tipo');
        	$tipo->nombre = $nombre;
        	$tipo->multiplicador = $multiplicador;
        	R::store($tipo);
		}

	}

?>