var coloresParaAsignar = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D', '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC', '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399', '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933', '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3','#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
var coloresAsignados = [];

var salaActual = chatid;
var hora;

// FUNCION PARA ENVIAR MENSAJE Y PRINTARLO EN EL CHAT
function enviarMensaje() {
	var mensaje = $('#mensaje').val();
	var salaActual = $('#nombreSala').text();

	// enviar al server (mandar a un controlador)
	$.ajax({
        type: "GET",
        url: "/chat/mensaje/"+chatid+"/"+mensaje,
        success: function(json){
        	json = JSON.parse(json);
            //alert(json);
        },
        error: function(){
        	alert("erroor!");
        } 
    });

	$('#mensaje').val("");	
}



// FUNCION PARA LIMPIAR EL CHAT
function limpiarChat(){
	$('#contenedorChat').remove();
}



// FUNCTION PARA OBTENER LOS MENSAJES AL ENTRAR EN LA SALA
$("cargarMensajes").ready( obtenerMensajes() );



// OBTENER LOS 20 ULTIMOS MENSAJES O LOS ULTIMO EN LA ANTERIOR HORA
function obtenerMensajes(){
	// hacer una funcion con un set interval y que este escuchando al json todo el rato asi obtendremos los nuevos mensajes
	$.ajax({
        type: "GET",
        url: "/chat/ultimosMensajes/"+chatid,
        success: function(json){
        	json = JSON.parse(json);
        	longitudJSON = json.length;

        	for(var item=0; item < json.length; item++){
        		mensaje = json[item]['mensaje'];
        		name = json[item]['usuario']['name'];
        		hora = json[item]['created_at'];
                hora = hora.replace(/\s/g,"_");
		
        		// printa por pantalla
				var span = $('<span ></span>');
				$(span).append('<b>'+name+'</b>');
				$(span).append('<br>');
				$(span).append(mensaje);
				var div = $('<div></div>');
				$(div).append(span);
				var li = $('<li></li>');
				$(li).append(div);
				$('#contenedorChat').append(li);
        	}

            alert("Ultimooo mensaje: " + hora);

        },
        error: function(){
        	alert("erroor!");
        } 
    });	
}


// FUNCION PARA ENTRAR A UNA SALA
function unirse(elemento){
	var sala = $(elemento).text();
	window.location.href = '/chat/unirse/' + sala;
}



// DON'T DO IT LIKE THIS
setInterval(ajaxCall, 1000);

function ajaxCall() {
    ///alert(salaActual);

    $.ajax({
        type: "GET",
        url: "/chat/actualizar/"+salaActual+"/"+hora,
        success: function(json){
            //alert(json);
            
            json = JSON.parse(json);
            longitudJSON = json.length;

            for(var item=0; item < json.length; item++){
                mensaje = json[item]['mensaje'];
                name = json[item]['usuario']['name'];
                hora = json[item]['created_at'];
                hora = hora.replace(/\s/g,"_");
                
                // printa por pantalla
                var span = $('<span ></span>');
                $(span).append('<b>'+name+'</b>');
                $(span).append('<br>');
                $(span).append(mensaje);
                var div = $('<div></div>');
                $(div).append(span);
                var li = $('<li></li>');
                $(li).append(div);
                $('#contenedorChat').append(li);
            }
        },
        error: function(){
            alert("erroor!");
        } 
    });
}


/*
// FUNCTION PARA SINCRONIZAR TODO EL RATO LOS MENSAJES
setInterval( function actualizar(){
    
    alert(hora);

	$.ajax({
        type: "GET",
        url: "/chat/actualizar/"+sala+"/"+hora,
        success: function(json){
            alert(json);

            json = JSON.parse(json);
            longitudJSON = json.length;

            for(var item=0; item < json.length; item++){
                mensaje = json[item]['mensaje'];
                name = json[item]['usuario']['name'];
                hora = json[item]['created_at'];
                hora = hora.replace(/\s/g,"_");
                
                // printa por pantalla
                var span = $('<span ></span>');
                $(span).append('<b>'+name+'</b>');
                $(span).append('<br>');
                $(span).append(mensaje);
                var div = $('<div></div>');
                $(div).append(span);
                var li = $('<li></li>');
                $(li).append(div);
                $('#contenedorChat').append(li);
            }

        },
        error: function(){
            alert("erroor!");
        } 
    });	

}, 1000);
*/