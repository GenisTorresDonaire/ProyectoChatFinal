/**
*@fileoverview/@summary: Hay la posibilidad de ver las noticias en formato listado o mosaico, generación e inserciones hechas con jquery, obtención de datos de todas las noticias mediante una llamada ajax. 
*@author: Genís Torres Donaire (gtd)
*creation: 15/03/2018
*/


/**
 * Varibales globales.
 */
var padre = $("#divNoticias");
var arrayDatos;


/**
 * Creación de los botones de Listado y Mosaico
 */
$("#divBotones").append("<button id='listado' onclick='listado()'>Listado</button>");
$("#divBotones").append("<button id='mosaico' onclick='mosaico()'>Mosaico</button>");


/**
 * @callback Petición AJAX que devuelve el JSON con todos los datos de Noticias.
 * @param GET {/noticiasExamen}
 * @return  {json}
 */
$.ajax({
    type: "GET",
    url: "/noticiasExamen",
    success: function(json){
    	json = JSON.parse(json);
    	arrayDatos = json;
    },
    error: function(){
    	alert("erroor!");
    } 
});


/**
 * @function Función Mosaico: Funcion que se encarga de eliminar todo el contenido, y regenerar noticias en formato de mosaico, tambien se encarga de bloquear la opcion actual.
 */
function mosaico(){
	// Vacia el contenedor padre
	padre.empty();
	
	// for que se encarga de recorrer el array, para ir creando tantas noticias como hayan en la base de datos.
	for ( var n = 0; n < arrayDatos.length ; n++){
		// Creacion de todos los elementos de noticias con jquery
		var div =  $("<div class='contenedorNoticiaMosaico'></div>");
		var titulo = $("<h1 class='tituloMosaico'>"+arrayDatos[n].titulo+"</h1>");
		var imagen = $("<img class='imagenMosaico' src='"+arrayDatos[n].imagen+"' />");
		var texto = $("<p class='textoMosaico'>"+arrayDatos[n].texto+"</p>");

		// Insercion de todos los elementos (titulo, imagen y texto), en el div de la noticia.
		div.append(titulo);
		div.append(imagen);
		div.append(texto);
		// Insercion del div en el padre (div general donde se almacenaran todas las noticias)
		padre.append(div);
	}

	// Bloquea el boton Mosaico y quita el bloqueo en caso de que lo tenga del boton Listado.
	$("#mosaico").prop("disabled", true);
	$("#listado").removeAttr("disabled");
}


/**
 * @function Función Listado: Funcion que se encarga de eliminar todo el contenido, y regenerar noticias en formato de listado, tambien se encarga de bloquear la opcion actual.
 */
function listado(){
	// Vacia el contenedor padre
	padre.empty();

	// for que se encarga de recorrer el array, para ir creando tantas noticias como hayan en la base de datos.
	for ( var n = 0; n < arrayDatos.length ; n++){
		// Creacion de todos los elementos de noticias con jquery
		var div =  $("<div class='contenedorNoticiaListado'></div>");
		var titulo = $("<h1 class='tituloListado'>"+arrayDatos[n].titulo+"</h1>");
		var imagen = $("<img class='imagenListado' src='"+arrayDatos[n].imagen+"' />");
		var texto = $("<p class='textoListado'>"+arrayDatos[n].texto+"</p>");

		// Insercion de todos los elementos (titulo, imagen y texto), en el div de la noticia.
		div.append(titulo);
		div.append(imagen);
		div.append(texto);
		// Insercion del div en el padre (div general donde se almacenaran todas las noticias)
		padre.append(div);
	}

	// Bloquea el boton Listado y quita el bloqueo en caso de que lo tenga del boton Mosaico.
	$("#listado").prop("disabled", true);
	$("#mosaico").removeAttr("disabled");
}

listado();