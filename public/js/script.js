
// FUNCION PARA ENVIAR MENSAJE Y PRINTARLO EN EL CHAT
function enviarMensaje() {
	var mensaje = $('#mensaje').val();
	var salaActual = $('#nombreSala').text();


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
                //alert(json);
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

// FUNCTION PARA OBTENER LOS MENSAJES AL ENTRAR EN LA SALA
function obtenerMensajes(){
	// hacer una funcion con un set interval y que este escuchando al json todo el rato asi obtendremos los nuevos mensajes
	/*
	$.ajax({
        type: "GET",
        url: "/api/mensajes",
        dataType: "json",
        success: function(json){
        	alert(json);
        	json = JSON.parse(json);
            
        },
        error: function(){
        	alert("erroor!");
        } 
    });	
    */
}

// FUNCTION PARA SINCRONIZAR TODO EL RATO LOS MENSAJES
function conectado(){

}

function unirse(elemento){
	var sala = $(elemento).text();
	window.location.href = '/chat/unirse/' + sala;
}