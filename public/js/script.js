// FUNCION PARA ENVIAR MENSAJE Y PRINTARLO EN EL CHAT
function enviarMensaje() {
	var mensaje = $('#mensaje').val();
	
	if ( mensaje != ""){

		// enviar al server


		// printa por pantalla
		var span = $('<span ></span>');
		$(span).append('<b>Tu: </b>');
		$(span).append(mensaje);
		var div = $('<div></div>');
		$(div).append(span);
		var li = $('<li></li>');
		$(li).append(div);
		$('#contenedorChat').append(li);
	}

	$('#mensaje').val("");	
}

