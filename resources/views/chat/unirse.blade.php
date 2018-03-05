@extends('layouts.app')

@section('content')
{{ Breadcrumbs::render('chat') }}
<div class="container d-flex justify-content-center ">
    
    <div class="row" >
      <div class="col-md-10" style="background-color: white;">
        <h1>CHAT</h1>
        <hr>
        <div class="col-md-3 ">
        </div>
        <div class="col-md-6 ">
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

                    <div class="panel-body" style="min-height: 400px;">
                        @foreach( $arrayGrupos as $key => $grupos ) 
                          <div id="{{$grupos['id']}}" onclick="unirse(this)">{{$grupos['nom']}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
          </div>
          <div class="col-md-3 ">
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
