@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center ">
  <div class="row" > 
    
    <div class="col-md-10" style="background-color: white;">
      <h2>Ultimas noticias</h2>
      <hr>
      
      @foreach( $arrayNoticias as $key => $noticias )
        <div class="container">
          <div class="row">
            <div class="col-md-4"><img class="fotoDenuncia" src="{{$noticias['imagen']}}" /></div>
              <div class="col-md-7">
              <h1>{{$noticias['titulo']}}</h1>

                <p>{{$noticias['texto']}}</p>
                <p>{{$noticias['created_at']}}</p>
              </div>

            </div>
            <br>
          </div>
        <br>
        <hr>
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