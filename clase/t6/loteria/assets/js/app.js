function accion(method, id, url) {
	var form = document.getElementById('formAccion-'+id);
	//console.log(form);
	form.action=url;
	form.method=method;
	form.submit();
}