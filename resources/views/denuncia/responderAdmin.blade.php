@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center ">
  <div class="row" > 
    
    <div class="col-md-10" style="background-color: white;">
      <h1>Denuncias Realizadas</h1>
      <hr>
      
        <div class="container">
            {{$denuncias['titulo']}}
                        
        </div>

          <br>
        </div>
        <br>
      
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