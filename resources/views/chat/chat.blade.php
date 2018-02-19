@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center ">
    
    <div class="row" >
      <div class="col-md-10" style="background-color: white;">
        <h1>CHAT</h1>
        <hr>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div id="divAmigos" class="panel-heading cabeceraChat" style="background: blue; color: white;"><b>Chat Rooms</b></div>
                
                <div class="panel-body" style="min-height: 400px;">     
                  @foreach( $arrayGrupos as $key => $grupos ) 
                    <div onclick="entrar()">{{$grupos['nom']}}</div>
                  @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-9 ">
            <div class="row">
                <div class="panel panel-default">
                    <div id="divChat" class="panel-heading cabeceraChat" style="background: blue; color: white; ">
                      <b>Chat</b><label style="float:right;" data-toggle="modal" data-target=".bd-example-modal-sm">+ Nueva Chat Room</label>
                    </div>
                    
                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">CREA TU CHAT ROOM</h5>
                          </div>
                          <div class="modal-body">
                            <form action="/chat" method="POST">
                              {{ csrf_field() }}
                                <label>Nombre Chat Room: <input type="text" name="nombre"></label>
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </form>
                          </div>    
                        </div>
                      </div>
                    </div>

                    <div id="Chat" class="panel-body" style="min-height: 400px;">
                        <ul id="contenedorChat" class="list-unstyled" style="text-decoration: none;">      
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="panel">
                    <p> 
                    <input id="mensaje" style="width: 660px;" type="text" name="mensaje" />
                        <input onclick="enviarMensaje()" style="float:right;" class="btn btn-primary" type="submit" value="->" name="Eviar">
                    </p>
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
