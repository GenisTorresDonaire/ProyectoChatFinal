@extends('layouts.app')
@section('content')
{{ Breadcrumbs::render('noticia') }}

<div class="container d-flex justify-content-center body" >
  <div class="row "  > 
    
    <div class="col-md-10  body2" style="background-color: white;">
      <h2>Ultimas noticias</h2>
      
      <form action="{{url('noticias1')}}" class="float-left wrap1"  style="visibility: hidden;" method="POST" id="1" enctype="multipart/form-data">
        {{ csrf_field() }}
        Categoria
        <select name="categorias">
          <option value="Todas">Cualquiera</option>
        @foreach( $arrayCategoria as $key => $categoria )
          <option value="{{$categoria['categoria']}}">{{$categoria['categoria']}} </option>
        @endforeach

        
        </select>
        <button type="submit" class="btn btn-primary">Seleccionar categoria</button>
     </form>
     <label class="float-right wrap1" style="visibility: hidden;"> Categoria actual : {{$name}}</label>


      <hr>
      @foreach( $arrayNoticias as $key => $noticias )
        @if ($name==$noticias['categoria'])
          @if ($noticias['importante']==0)
            <div class="container   ">
              <div class="row wrap" style="background-color:#DCDCDC; visibility: hidden;width: 10%" >
                <div class="col-md-4"><img id="foto" class="fotoDenuncia" style="visibility: hidden;" src="{{$noticias['imagen']}}" /></div>
                  <div class="col-md-7 txt" style="background-color:#DCDCDC; visibility: hidden; overflow: hidden ; word-wrap: break-word; ">
                  <h1>{{$noticias['titulo']}}</h1>

                    <p class="texto" >{{$noticias['texto']}}</p>
                    <p>{{$noticias['created_at']}}</p>
                  </div>

                </div>
                <br>
              </div>
            <br>
            <hr>
          @endif

        @elseif($name=="Todas")
          @if ($noticias['importante']==0)
            <div class="container">
              <div class="row wrap" style="background-color:  #DCDCDC; visibility: hidden; width: 10%">
                <div class="col-md-4"><img id="foto" class="fotoDenuncia" style="visibility: hidden;" src="{{$noticias['imagen']}}" /></div>
                  <div class="col-md-7 txt" style="background-color:#DCDCDC; visibility: hidden;overflow: hidden ; word-wrap: break-word;">
                  <h1>{{$noticias['titulo']}}</h1>

                    <p class="texto">{{$noticias['texto']}}</p>
                    <p>{{$noticias['created_at']}}</p>
                  </div>

                </div>
                <br>
              </div>
            <br>
            <hr>
           @else
          @endif
        @endif
        @endforeach

      @foreach( $arrayNoticias as $key => $noticias )
        @if ($name==$noticias['categoria'])
          @if ($noticias['importante']==1)
            <div class="container">
              <div class="row wrap" style="background-color:  #DCDCDC; visibility: hidden; width: 10%">
                <div class="col-md-4"><img id="foto" class="fotoDenuncia" style="visibility: hidden;" src="{{$noticias['imagen']}}" /></div>
                  <div class="col-md-7 txt " style="background-color:#DCDCDC; visibility: hidden;overflow: hidden ; word-wrap: break-word;">
                  <h1>{{$noticias['titulo']}}</h1>

                    <p class="texto">{{$noticias['texto']}}</p>
                    <p>{{$noticias['created_at']}}</p>
                  </div>

                </div>
                <br>
              </div>
            <br>
            <hr>
          @else
          @endif

        @elseif($name=="Todas")
          @if ($noticias['importante']==1)
            <div class="container">
              <div class="row wrap" style="background-color:  #DCDCDC; visibility: hidden; width: 10%">
                <div class="col-md-4"><img id="foto" class="fotoDenuncia" style="visibility: hidden;"  src="{{$noticias['imagen']}}" /></div>
                  <div class="col-md-7 txt" style="background-color:#DCDCDC; visibility: hidden;overflow: hidden ; word-wrap: break-word;">
                  <h1>{{$noticias['titulo']}}</h1>

                    <p class="texto">{{$noticias['texto']}}</p>
                    <p>{{$noticias['created_at']}}</p>
                  </div>

                </div>
                <br>
              </div>
            <br>
            <hr>
          @else
          @endif
        @endif
      @endforeach
    
        </div>

    <div class="col-md-2">
      <div class="panel panel-default">
          <div id="divBanner" class="panel-heading"><b>Banner</b></div>
              
          <div class="panel-body ">
              <img id="banner" class="img-responsive banner" style="visibility: hidden;" src="{{asset('images/banner.jpg')}}">
          </div>
      </div>
    </div>

  </div>
</div>


@endsection