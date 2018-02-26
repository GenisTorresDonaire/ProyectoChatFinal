@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center ">
  <div class="row" > 
    
    <div class="col-md-10" style="background-color: white;">
      <h1>Denuncias Realizadas</h1>
      <hr>
      
      @foreach( $arrayDenuncias as $key => $denuncia )
        <div class="container">

          <div style="float: left; border-color: red;">
              <img class="fotoDenuncia" src="/{{$denuncia['imagen']}}" />

          </div>

          <div style="float: left;">
              <p>{{$denuncia['created_at']}}</p>
              <p>{{$denuncia['text']}}</p>
              
              <p>{{url('/denuncias/show/' . $denuncia['id'])}}</p>
              <form action="{{url('/denuncias/comentar')}}" method="POST" id="a{{$denuncia['id']}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$denuncia['id']}}">
                

              </form>

               <button onclick="responder(this)" id="{{$denuncia['id']}}"> Responder </button>

             
              
          </div>

          <br>
        </div>
        <br>
      @endforeach
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