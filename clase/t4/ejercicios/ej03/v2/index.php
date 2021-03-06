<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript">
		var x;

		function accionAjax(){
			var response = x.responseText;
			response = response.split('#');
			document.getElementById('idWord').innerHTML = response[0];
			document.getElementById('idTranslation').innerHTML = response[1];
			document.getElementById('idBoton').value = response[2];
		}

		function peticionAjax(){
			idioma = document.querySelector('input[name="idioma"]:checked').value;
			x = new XMLHttpRequest();
			x.open('GET','ajax.php?idioma='+idioma,true);
			x.setRequestHeader('X-Requested-With','XMLHttpRequest');
			x.send();

			x.onreadystatechange = function (){
				if(x.readyState==4 && x.status==200) {
					accionAjax();
				}
			}
		}
	</script>
</head>
<style type="text/css">
	img { margin-right: 4px; }

	input { margin: 0px 8px 0 0;  }
	label { display: block; }
</style>
<body>
	<div class="container pt-4">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2>Label en idiomas</h2>
				<hr />
				<?php
					require_once '../bd.php';
					$idioma = isset ( $_REQUEST ['idioma'] ) ? $_REQUEST ['idioma'] : 'ES';
					$etiquetas = $BDetiquetas[$idioma];
					$lPalabra = $etiquetas[0];
					$lTraduccion = $etiquetas[1];
					$lEnviar = $etiquetas[2];
					echo pintarRadioPaises( $idioma );
					echo "<hr />";
				?>
			</div>
			<div class="col-md-6 offset-md-3">
				<div class="form-group">
					<label id="idWord"><?php echo $lPalabra?></label>
					<input type="text" name="" id="">
				</div>
				<div class="form-group">
					<label id="idTranslation"><?php echo $lTraduccion; ?></label>
					<input type="text" name="" id="">
				</div>
				<div class="form-group"><input type="submit" id="idBoton" value="<?php echo $lEnviar; ?>"></div>
			</div>
			<div id="miDiv"></div>
		</div>
	</div>
	
</body>
</html>