var coloresParaAsignar = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D', '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC', '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399', '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933', '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3','#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
var coloresAsignados = [];



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

function asignarEstilos(){
    // funcion que va dando colores del array que no se hayan asignado ya
	for (var x = 0; x <= coloresParaAsignar.length(); x++){
		coloresAsignados.push(coloresParaAsignar[x]);
	}

	return color;
}


// FUNCION PARA SABER SI HAY ALGUN MENSAJE NUEVO
/*
setInterval(function printar(){
	$.getJSON("/chat/ultimosMensajes/{sala}", function(array){
		limpiarChat();
		for(var i=0; i<array.length;i++){
			var mensaje = JSON.stringify(array[i].mensaje);
			var id_usuario = JSON.stringify(array[i].id_usuario);

			var span = $('<span></span>');

			$(span).append('<b></b>');
			$(span).append(id_usuario);			
			$(span).append(mensaje);
			
			var div = $('<div></div>');
			$(div).append(span);
			var li = $('<li></li>');
			$(li).append(div);
			$('#contenedorChat').append(li);
}
	});
}, 1000);
*/