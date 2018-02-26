// FUNCION PARA ENVIAR MENSAJE Y PRINTARLO EN EL CHAT
function enviarMensaje() {
	var mensaje = $('#mensaje').val();
	
	if ( mensaje != ""){
		// printa por pantalla
		var span = $('<span ></span>');
		$(span).append('<b>Tu: </b>');
		$(span).append(mensaje);
		var div = $('<div></div>');
		$(div).append(span);
		var li = $('<li></li>');
		$(li).append(div);
		$('#contenedorChat').append(li);

		// enviar al server (mandar a un controlador)
		$.ajax({
            type: "POST",
            url: "register",
        });
	}

	$('#mensaje').val("");	
}


// FUNCION PARA LIMPIAR EL CHAT
function limpiarChat(){
	$('#contenedorChat').remove();
}


function entrar(){
	
}


function responder($this){
	var id= $this.id;
	alert("a"+id);

	var boton = document.getElementById(id);
	boton.style.display = 'none';
	var comentar =$("<input type='text' name='comentario'>");
	var botonSub =$('<button type="submit" class="btn btn-primary">Enviar comentario</button>');
	$('#a'+id).append(comentar);
	$('#a'+id).append(botonSub);




}