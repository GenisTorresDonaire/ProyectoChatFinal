@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('crear1') }}


<div class="container d-flex justify-content-center " >
	<button onclick="crearFormulario()" id="botonform"> Crear noticia</button>
    <div class="row" >
    	<div class="col-md-10 offset-md-2" style="background-color: white;">
    		<form action="{{url('noticias')}}" method="POST" id="1" enctype="multipart/form-data">
    			{{ csrf_field() }}





    		</form>
    	</div>
    

      <div class="col-md-2">
            <div class="panel panel-default">
                <div id="divBanner" class="panel-heading"><b>Banner</b></div>
                    
                <div class="panel-body">
                    <img id="banner" class="img-responsive" src="{{asset('images/banner.jpg')}}">
                </div>
            </div>
        </div>
    </div>
    

</div>
@endsection