function accion(id, tipo) {
	var form = document.getElementById('formAccion-'+id);
	form.action=tipo;
	form.submit();
}