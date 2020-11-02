var x;

function accionAjax(){
	var response = x.responseText;
	console.log(response);
	//response = response.split('#');
	if(response === 'sinResultados') {
		var html = '<tr>';
	    html += '<td colspan="4">No hay resultados</td>';
	    html +='</tr>';
	    document.getElementById('idTable').innerHTML = html;
	} else {
		document.getElementById('idTable').innerHTML = response;
	}
	
}

function peticionAjax(){
	var datosForm = serialize( document.getElementById('idFormFiltros') );
	x = new XMLHttpRequest();
	x.open('POST','ajaxEmpleados.php',true);
	x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	x.setRequestHeader('X-Requested-With','XMLHttpRequest');
	x.send(datosForm);

	x.onreadystatechange = function (){
		if(x.readyState==4 && x.status==200) {
			accionAjax();
		}
	}
}