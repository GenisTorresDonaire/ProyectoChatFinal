@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center ">
    
    <div class="row" >
      <div class="col-md-10" style="background-color: white;">
        <h1>CHAT</h1>
        <hr>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div id="divAmigos" class="panel-heading cabeceraChat" style="background: blue; color: white;"><b>Amigos</b></div>
                    
                <div class="panel-body">
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo1</b>
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo2</b>
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo3</b>
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo4</b>
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo5</b>
                    <img id="imagenUser" src="images/pageLoader.gif"><b>Manolo6</b>
                </div>
            </div>
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div id="divChat" class="panel-heading cabeceraChat" style="background: blue; color: white;">
                  <b>Chat</b>
                </div>
                    
                <div class="panel-body">
                    <div style="float: left;">
                      <p><b>Manolo1: </b>Hola q tal?!!!</p>
                    </div>
                    <br>
                    <div style="float: right;">
                      <p><b>Tu: </b>Hola!! bien y tu?</p>
                    </div>
                </div>

              </div>
          </div>
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