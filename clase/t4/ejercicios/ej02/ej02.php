<?php 
	require_once 'bd.php';
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script>
		var x;
		
		function accionAjax(){
			var text = x.responseText;
			document.getElementById('myDiv').innerHTML = x.responseText;
		}
		
		function peticionAjax(){
			
			x = new XMLHttpRequest();
			var ccaa = document.getElementById('idComunidades').value;
			document.getElementById('divProvincias').style.display='block';
			x.open("GET","ej02Ajax.php?comunidad="+ccaa,true);
			x.setRequestHeader('X-Requested-With','XMLHttpRequest');
			x.send();
			x.onreadystatechange = function(){
				if( x.readyState == 4 && x.status == 200 ) {
					accionAjax();
				}
			}			
		}
	</script>
</head>
<body>

<div class="container pt-4">
	<div class="row">
		<div class="col-md-6 offset-md-3">
	<h1>Comunidades autónomas</h1>

	<form>
	<div class="form-group">	
		<label>CCAA</label><br>
		<select name="comunidades" id="idComunidades" class="form-control" onchange="peticionAjax()" >
			<option value="">Selecciona una comunidad</option>
			<?php 

				$comunidades = array_keys($bd);
				foreach ($bd as $key => $value) {
					echo "<option value=\"$key\">$key</option>";
				}
			?>
		</select>
	</div>


	<div class="form-group" style="display:none;" id="divProvincias">
		<label>Provincias</label><br/>
		<div id="myDiv">
			<select name="provincias" id="idProvincias" class="form-control" id="" >
				<option value="Almeria">Almeria</option>
			</select>
		</div>
	</div>
	</form>
	</div>
	</div>
</div>
</body>