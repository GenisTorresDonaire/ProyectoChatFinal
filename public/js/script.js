var salaActual;

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
            type: "GET",
            url: "/chat/mensaje/"+1+"/"+mensaje,
            success: function(json){
            	json = JSON.parse(json);
                alert(json);
            },
            error: function(){
            	alert("erroor!");
            } 
        });
	}

	$('#mensaje').val("");	
}


// FUNCION PARA LIMPIAR EL CHAT
function limpiarChat(){
	$('#contenedorChat').remove();
}


function unirse(elemento){
	var sala = $(elemento).text();
	window.location.href = '/chat/unirse/' + sala;
}