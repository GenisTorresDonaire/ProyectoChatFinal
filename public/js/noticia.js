function crearFormulario() {
	var boton = document.getElementById('botonform');
	boton.style.display = 'none';
	/*var form = $("<form action='localhost:8000/denuncias' method='POST' enctype='multipart/form-data'></form>");	
	var blanco =$("<div class='col-md-10 offset-md-2' style='background-color: white;''>");*/
	var ttic =$("<div class='form-group m-5' >");
	var select =$("<select name='categorias'></select>");

	
	//blanco.append(form);
	
	$('#1').append('<input type=button value=button');
	
	
	$('#1').append('<h1>Redacta la noticia</h1>');
	$('#1').append('<hr>');
	$('#1').append(ttic);
	ttic.append('<label for="exampleTextarea">Titulo de la noticia</label>');
	ttic.append('<input class="form-control" id="exampleTextarea" rows="3" name="tituloNoticia"></input>')
	$('#1').append(ttic);
	ttic.append('<label for="exampleTextarea">Texto de la noticia</label>');
	ttic.append('<textarea class="form-control" id="exampleTextarea" rows="3" name="textoNoticia"></textarea>');
	$('#1').append(ttic);
	ttic.append('<label for="exampleInputFile">Vincula alguna imagen</label>');
	ttic.append('<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="imagenFormulario">');
	
	ttic.append('<label for="exampleTextarea">Noticia importante :</label>');
	ttic.append('<input type=radio id="importante" name="imp" value="0">Si</input>');	
	ttic.append('<input type=radio id="importante" name="imp" value="1">No</input>');
	ttic.append('<br>');
	$('#1').append(ttic);

	ttic.append('<label for="exampleTextarea">Categoria de la noticia</label>');
	ttic.append('<input type="text" class="form-control-file" id="categoria" name="categorias">');



	$('#1').append('<button type="submit" class="btn btn-primary">Enviar noticia</button>');



	//$('#1').prepend(blanco);
	/* <select>
	  <option value="volvo">Volvo</option>
	  <option value="saab">Saab</option>
	  <option value="mercedes">Mercedes</option>
	  <option value="audi">Audi</option>
	</select> */
}