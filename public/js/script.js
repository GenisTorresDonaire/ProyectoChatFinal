var coloresParaAsignar = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D', '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC', '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399', '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933', '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3','#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];
var coloresAsignados = {};
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

        },
        error: function(){
        	alert("erroor!");
        } 
    });

	$('#mensaje').val("");

    if( hora == null ){
        obtenerHora();
    }
    
}


// FUNCION PARA LIMPIAR EL CHAT
function limpiarChat(){
	$('#contenedorChat').remove();
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

                var estilo = tieneColor(name);
            
        		// printa por pantalla
				var span = $('<span ></span>');
				$(span).append('<b style="color:'+estilo+'">'+name+'</b>');
                $(span).append(mensaje);
				
                if ( name == usuarioActual ){
                    var div = $('<div style="float:right; text-align:left; border: 1px solid black; border-radius: 3px; background-color: white; padding: 5px 5px 5px 5px; min-width: 100px; margin-top: 5px;"></div>')
                }else{
                    var div = $('<div style="float:left; text-align:left; border: 1px solid black; border-radius: 3px; background-color: white; padding: 5px 5px 5px 5px; min-width: 100px;  margin-top: 5px;"></div>');
                }
                
                $(div).append(span);
                var div2 = $('<div style="display: block; height: auto; overflow:auto; min-width: 100%;"></div>');
                $(div2).append(div);
				var li = $('<li></li>');
				$(li).append(div2);
                $('#contenedorChat').append(li);
        	}

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
                
                var estilo = tieneColor(name);
            
                // printa por pantalla
                var span = $('<span ></span>');
                $(span).append('<b style="color:'+estilo+'">'+name+'</b>');
                $(span).append('<br>');
                $(span).append(mensaje);
                
                if ( name == usuarioActual ){
                    var div = $('<div style="float:right; text-align:left; border: 1px solid black; border-radius: 3px; background-color: white; padding: 5px 5px 5px 5px; min-width: 100px; margin-top: 5px;"></div>')
                }else{
                    var div = $('<div style="float:left; text-align:left; border: 1px solid black; border-radius: 3px; background-color: white; padding: 5px 5px 5px 5px; min-width: 100px;  margin-top: 5px;"></div>');
                }
                
                $(div).append(span);
                var div2 = $('<div style="display: block; height: auto; overflow:auto; min-width: 100%;"></div>');
                $(div2).append(div);
                var li = $('<li></li>');
                $(li).append(div2);
                $(li).append('<br>');
                $('#contenedorChat').append(li);
            }
        },
        error: function(){
            alert("erroor!");
        } 
    });
}


function obtenerHora(){
    var d = new Date();
    var dia;
    var mes;
    
    if ( d.getMonth() < 10 ){
        dia = "0"+d.getMonth()
    }
    if ( d.getDate() < 10 ){
        dia = "0"+d.getDate()
    }

    var fecha = d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear() + "_" + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    hora = fecha;
}


function tieneColor(name){
  
    if( !coloresAsignados[name] ){
        var color = buscarColor();

        coloresAsignados[name] = color;
        return coloresAsignados[name];
    }
    else{
        return coloresAsignados[name];
    }
}


function buscarColor(){
    for (var v=0; v<coloresParaAsignar.length; v++){
        var color = coloresParaAsignar[v];
        coloresParaAsignar.splice(0,1);
        return color;   
    }
}

