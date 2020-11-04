var x;

function accionAjax(tipo){
	var response = x.responseText;
	
	//response = response.split('#');
	if(tipo == 'peli') {
		console.log(response);
		document.getElementById('idPeli').value = response;
	} else {
		document.getElementById('idCancion').value = response;
	}

}

function peticionAjax(tipo){
	x = new XMLHttpRequest();
	x.open('GET','ajax.php?tipo='+tipo,true);
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send();

	x.onreadystatechange = function (){
		if(x.readyState==4 && x.status==200) {
			accionAjax(tipo);
		}
	}
}