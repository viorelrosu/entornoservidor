var x;

function accionAjax(){
	var response = x.responseText;
	console.log(response);
	//response = response.split('#');
	// document.getElementById('id').value = response;
	// document.getElementById('id').inerHTML = response;
}

function peticionAjax(){
	x = new XMLHttpRequest();
	x.open('GET','ajax.php',true);
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send();

	x.onreadystatechange = function (){
		if(x.readyState==4 && x.status==200) {
			accionAjax();
		}
	}
}