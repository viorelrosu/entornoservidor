var x;

function accionAjax(){
	var response = x.responseText;
	//console.log(response);
	response = response.split('#');
	if(document.getElementById('idUser')) {
		document.getElementById('idUser').innerHTML = response[0];
		document.getElementById('idPass').innerHTML = response[1];
		document.getElementById('idBoton').value = response[2];
		document.getElementById('idRecordar').innerHTML = response[3];
		document.getElementById('idMensajeInicio').innerHTML = response[4];
	} else {

		if(document.getElementById('idError'))
			document.getElementById('idError').innerHTML = response[6];

		if(document.getElementById('idBienvenida'))
			document.getElementById('idBienvenida').innerHTML = response[7];

		if(document.getElementById('idVolver'))
			document.getElementById('idVolver').innerHTML = response[8];

		if(document.getElementById('idSalir'))
			document.getElementById('idSalir').innerHTML = response[10];

		if(document.getElementById('idAcierto'))
			document.getElementById('idAcierto').innerHTML = response[11];

		if(document.getElementById('idCorto'))
			document.getElementById('idCorto').innerHTML = response[12];

		if(document.getElementById('idPasado'))
			document.getElementById('idPasado').innerHTML = response[13];

		if(document.getElementById('idMyNumber')) {
			var numRand = document.getElementById('idMyNumber').getAttribute('data-num');
			document.getElementById('idMyNumber').innerHTML = response[14] + ' ' + numRand;
		}

		if(document.getElementById('idYourNumber')){
			var num = document.getElementById('idMyNumber').getAttribute('data-num');
			document.getElementById('idYourNumber').innerHTML = response[15]+' '+ num;
		}

	}
	document.getElementById('idTitle').innerHTML = response[5];
	// document.getElementById("idFCambioIdioma").submit();
}

function peticionIdiomasAjax(){
	idioma = document.querySelector('input[name="idioma"]:checked').value;
	x = new XMLHttpRequest();
	x.open('GET','ajaxIdiomas.php?id='+idioma,true);
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send();

	x.onreadystatechange = function (){
		if(x.readyState==4 && x.status==200) {
			accionAjax();
		}
	}
}