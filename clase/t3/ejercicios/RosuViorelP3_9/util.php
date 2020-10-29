<?php

	function getHtmlTitle($texto, $botton=false){
		if($botton) {
			$html = <<<HTML
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<div class="row">
							<div class="col-md-8"><h2 class="text-left">$texto</h2></div>
							<div class="col-md-4 text-right"><a href="login.php?tipo=cerrar" class="btn btn-info">Cerrar sesión</a></div>
						</div>
						<hr />
					</div>
				</div>
			HTML;
		} else {
			$html = <<<HTML
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<h2 class="text-center">$texto</h2>
						<hr />
					</div>
				</div>
			HTML;
		}

		return $html;
	}

	function getHtmlFooter(){
		$html = <<<HTML
			<footer>
				<div class="row">
					<div class="col-md-4 offset-md-4 text-muted">
						<hr />
						&copy; Entorno Servidor - Ejercicio 09 | Viorel Rosu
					</div>
				</div>
			</footer>
		HTML;

		return $html;
	}

	function getUsuariosCorreos(){
		$userActive = $_SESSION['_activo'];
		$usuarios = $_SESSION['usuarios'];
		$correosRecibidos = $_SESSION['usuarios'][$userActive]['mensajes'];
		$data = [];

		foreach ($usuarios as $nombre => $usuario) {
			if ( $nombre != $userActive ) {
				$num=0;
				foreach($correosRecibidos as $correo) {
					if( $correo['remitente'] == $nombre ) {
						$num++;
					}
				}
				$data[] = [ 'nombre' => $nombre, 'total' => $num ];
			}
		}

		return $data;
	}

	function getHtmlUsuariosCorreos() {
		$data = getUsuariosCorreos();
		$htmlCorreos = '';
		if ( sizeof ($data) > 0 ) {
			//sacar los tr's para la Tabla
			$htmlTrs = ''; $index=0;
			foreach($data as $indice => $item) {
				$nombre = $item['nombre'];
				$total = $item['total'];
				if($total > 0) {
					$classNum = 'primary';
					$botones = <<<HTML
							<a class="btn btn-primary" href="leer.php?remitente=$nombre">Leer</a>
							<a class="btn btn-primary" href="escribir.php?destinatario=$nombre">Escribir</a>
						HTML;
				} else {
					$classNum = 'danger';
					$botones = <<<HTML
							<a class="btn btn-primary" href="escribir.php?destinatario=$nombre">Escribir</a>
					HTML;
				}

				$index++;
				$htmlTrs .= <<<HTML
					<tr>
				      <th scope="row">$index</th>
				      <td>$nombre</td>
				      <td class="text-center"><span class="badge badge-pill badge-$classNum">$total</span></td>
				      <td class="text-center">
				      	<div class="btn-group btn-group-sm" role="group">
						  	$botones
						</div>
				      </td>
				    </tr>
				HTML;
			}
			//creamos la tabla
			$htmlCorreos .= <<<HTML
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombre</th>
				      <th scope="col" class="text-center">Mensajes</th>
				      <th scope="col" class="text-center">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	$htmlTrs
				  </tbody>
				</table>
			HTML;
		} else {
			$htmlCorreos .= <<<HTML
				<div class="alert alert-danger" role="alert">
			  		Lo siento, no hay correos.
				</div>
			HTML;
		}

		return $htmlCorreos;
	}

	function getHtmlCorreosContent($userRemitente) {
		$htmlCorreos = '';
		$mensajes = $_SESSION['usuarios'][$_SESSION['_activo']]['mensajes'];
		$htmlTrs = ''; $index=0;
		foreach($mensajes as $indice => $mensaje) {
			if ($mensaje['remitente'] == $userRemitente) {
				$fecha = $mensaje['fecha'];
				$texto = $mensaje['texto'];
				$index++;
				$htmlTrs .= <<<HTML
					<tr>
				      <th scope="row">$index</th>
				      <td>$fecha</td>
				      <td class="text-center">$texto</td>
				      <td class="text-center">
				      	<div class="btn-group btn-group-sm" role="group">
						  	<a class="btn btn-danger" href="leer.php?remitente=$userRemitente&accion=borrar&indice=$indice">Borrar</a>
						</div>
				      </td>
				    </tr>
				HTML;
			}
		}

		if($index > 0) {

			$htmlCorreos .= <<<HTML
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nombre</th>
				      <th scope="col" class="text-center">Mensajes</th>
				      <th scope="col" class="text-center">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	$htmlTrs
				  </tbody>
				</table>
			HTML;

		} else {
			$htmlCorreos .= <<<HTML
				<div class="alert alert-danger" role="alert">
					Lo siento, no tienes mensajes de este remitente!
				</div>
			HTML;
		}

		return $htmlCorreos;
	}

?>