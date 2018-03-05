@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('crear') }}
<div class="container d-flex justify-content-center ">
    <div class="row" >
      <div class="col-md-10 offset-md-2" style="background-color: white;">
        
        <form action="{{url('denuncias')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
          <h1>Redacte su denundia</h1>
          <hr>
          <div class="form-group">
            <label for="exampleTextarea">Descripcion</label>
            <textarea class="form-control" id="exampleTextarea" rows="3" name="textoFormulario"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="imagenFormulario">
            <small id="fileHelp" class="form-text text-muted">Vincula alguna imagen.</small>
          </div>
          <fieldset class="form-group">
              <div id="map"></div>
              <button type="submit" class="btn btn-primary">Enviar denuncia</button>
            </fieldset>
            
        </form>

      </div>

      <div class="col-md-2">
            <div class="panel panel-default">
                <div id="divBanner" class="panel-heading"><b>Banner</b></div>
                    
                <div class="panel-body">
                    <img id="banner" class="img-responsive" src="{{asset('images/banner.jpg')}}">
                </div>
            </div>
        </div>
        <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxo93yvVKCbGw4b71zF5ZYDcfn_BD34gY&callback=initMap">
        </script>
    </div>
</div>
@endsection