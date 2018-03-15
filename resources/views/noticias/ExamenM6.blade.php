@extends('layouts.app')



@section('content')
{{ Breadcrumbs::render('ExamenM6') }}


<div class="container d-flex justify-content-center ">
  <div class="row" > 
    
    <div class="col-md-10" style="background-color: white;">
      <h2>Ultimas noticias</h2>
      <br>
      <div id="menu">
        <div id="divBotones"></div>
      </div>
      
      <br>
      <br>
      <div id="divNoticias">
        
      </div>
      <hr>
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