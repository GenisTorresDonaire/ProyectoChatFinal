@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center ">
    <div class="row" >
      <div class="col-md-10" style="background-color: white;">
        <h1>CHAT</h1>
        <hr>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div id="divAmigos" class="panel-heading"><b>Amigos</b></div>
                    
                <div class="panel-body">
                    <div>Manolo1</div>
                    <div>Manolo2</div>
                    <div>Manolo3</div>
                    <div>Manolo4</div>
                    <div>Manolo5</div>
                    <div>Manolo6</div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                <div id="divChat" class="panel-heading"><b>Chat</b></div>
                    
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