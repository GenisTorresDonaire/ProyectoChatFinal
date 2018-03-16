/**
*@fileoverview/@summary: Añade animaciones a la pagina noticias
*@author: Jonatan Pizarro Serrano (JPS)
*creation: 12/3/18
*/


/**
En esta variable almaceno el contenedor donde estan todas la noticias
*/
var $body = $('.body2');

/**
En esta variable almaceno el contenido de las noticias
*/
var $wrap =$('.wrap');


/**
La variable Wrap almacena una secuencia que aumentara el width de la variable $wrap progresivamente , una vez completado eso
llamará a la funcion setVisibilityTxt para cambiar la visibilidad de los elementos cogidos en la funcion , despues 
hará las animaciones en los elemntos especificados entre parentesis
*/
var Wrap = [
  { elements: $wrap, properties: { width: '15%' } }, 
    { elements: $wrap, properties: { width: '25%' } },
    { elements: $wrap, properties: { width: '35%' } },
    { elements: $wrap, properties: { width: '48%' } },
    { elements: $wrap, properties: { width: '67%' } },
    { elements: $wrap, properties: { width: '83%' } }, 
    { elements: $wrap, properties: { heigth:'200px' }   
  , options: { 
      complete: function () { 
        setVisibilityTxt(),
        $('.body2 div').velocity( 'transition.bounceIn',{stagger: 50, drag: true }); 
        $('.fotoDenuncia').velocity( 'transition.slideLeftIn',{stagger: 100, drag: true });  

        $('p').velocity({left: "100px"}, 625 ,[500,60]) .velocity("reverse");
        
      }
    }
  }
]; 


/**
Creo la secuencia Body y hago lo mismo que la anterior solo que aqui una vez terminada la expansion de la variable
 llamaremos a la secuencia Wrap
*/
var Body = [
	{ elements: $body, properties: { width: '15%' } },
    { elements: $body, properties: { width: '25%' } },
    { elements: $body, properties: { width: '35%' } },
    { elements: $body, properties: { width: '48%' } },
    { elements: $body, properties: { width: '67%' } },
    { elements: $body, properties: { width: '83%' } }, 
    { elements: $body, properties: { heigth: '200px' }     
	, options: { 
      complete: function () {  
        setVisibilityBody();    
        $('.body2 form').velocity( 'transition.bounceIn' ,{stagger: 50, drag: true }); 
        $('img').velocity( 'transition.slideRightIn',{stagger: 50, drag: true });         	
        $.Velocity.RunSequence(Wrap);        
      }
    }
  }
]; 

/**
Llamo a la secuencia body
*/
$.Velocity.RunSequence(Body);

/**
//En esta funcion cogere los divs que contienen el texto de la noticia y las fotos de la noticia y los haré visibles
*/
function setVisibilityTxt(){
	var divs = document.getElementsByClassName('txt');
  var foto =document.getElementsByClassName('fotoDenuncia');

	for (var i = 0; i < divs.length; i++) {
		divs[i].style.visibility = "visible" ;
	}

  for (var i = 0; i < foto.length; i++) {
    foto[i].style.visibility = "visible" ;
  }

	
}
/**
//En esta funcion cogere el div que contiene las noticias y el formulario para buscar categoria y los haré visibles
*/
function setVisibilityBody(){
  var divs = document.getElementsByClassName('wrap');
  var divs1 = document.getElementsByClassName('wrap1');
  var foto =document.getElementsByClassName('banner');

  for (var i = 0; i < divs.length; i++) {
    divs[i].style.visibility = "visible" ;
  }

   for (var i = 0; i < divs1.length; i++) {
    divs1[i].style.visibility = "visible" ;
  }

  for (var i = 0; i < foto.length; i++) {
    foto[i].style.visibility = "visible" ;
  }
  
}