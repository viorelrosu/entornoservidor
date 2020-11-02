var x;

document.getElementById('idAlert').style.display = 'none';
document.getElementById('idSuccess').style.display = 'none';

function accionAjax(){
	var response = x.responseText;
	response = response.split('#');
	console.log(response);
	if(response[0]=='error') {
		document.getElementById('idAlert').innerHTML = response[1];
		document.getElementById('traduccion').value = '';
		document.getElementById('idAlert').style.display = 'block';
		document.getElementById('idSuccess').style.display = 'none';
	} else {
		document.getElementById('idSuccess').innerHTML = response[1];
		document.getElementById('traduccion').value = response[2];

		document.getElementById('idSuccess').style.display = 'block';
		document.getElementById('idAlert').style.display = 'none';
	}
}

function peticionAjax(){
	var palabra = document.getElementById('palabra').value;
	var enIdioma = document.getElementById('enIdioma').value;
	x = new XMLHttpRequest();
	x.open('GET','ajax.php?palabra='+palabra+'&enIdioma='+enIdioma,true);
	//x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send();

	x.onreadystatechange = function (){
		if(x.readyState==4 && x.status==200) {
			accionAjax();
		}
	}
}