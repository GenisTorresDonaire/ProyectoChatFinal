@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
=======
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
>>>>>>> d7e44d8f84da5f8fe7df22dbd6580719ca5f1a19

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    You are logged in!
=======
                    Te has logeado correctamente!
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Banner</div>

                <div class="panel-body">
                    <img id="banner" class="img-responsive" src="{{asset('images/banner.jpg')}}">
>>>>>>> d7e44d8f84da5f8fe7df22dbd6580719ca5f1a19
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> d7e44d8f84da5f8fe7df22dbd6580719ca5f1a19
