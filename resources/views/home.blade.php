@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Datos Usuario</div>

                <div class="panel-body">
                    <p><b>Usuario: </b>{{Auth::user() -> rol}}</p>
                    <p><b>Nombre: </b>{{Auth::user() -> name}}</p>
                    <p><b>Email: </b>{{Auth::user() -> email}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido!!</div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Te has logeado correctamente!
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Banner</div>

                <div class="panel-body">
                    <img id="banner" class="img-responsive" src="{{asset('images/banner.jpg')}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
