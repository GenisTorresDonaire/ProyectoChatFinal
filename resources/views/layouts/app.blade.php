<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('images/pageLoader.gif') }}" rel="stylesheet">
        
        <style type="text/css">
                
            ul.menu{
                list-style: none;
            }
            
            ul.menu ul{
                display: none;
                list-style: none;
            }
            
            ul.menu li:hover > ul{
                display: block;
            }
            
            .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('images/pageLoader.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;    
            }
        </style>
        
        @yield('head')


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script type="text/javascript">
            $(window).load(function() {
                $(".loader").fadeOut("slow");
            });
        </script>
    </head>

    <body>
        <div class="loader"></div>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        
                            <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav menu">
                            &nbsp;
                        @if( Auth::user() )
                            <li><a id="botonMenu" href="{{ url('/home') }}">Home</a></li>                        
                            <li><a id="botonMenu" href="{{ url('/chat') }}">Chats</a></li>
                            <li><a id="botonMenu" href="{{ url('/denuncias') }}">Denuncias</a>
                                <ul>
                                    <li><a id="botonMenu" href="{{ url('/denuncias/crear') }}">Creare denuncia</a></li>
          
                                @if( Auth::user() && Auth::user()->rol == 'Admin' )
                                    <li><a id="botonMenu" href="{{ url('/denuncias/responder') }}">Responder denuncia</a></li>
                                @endif
                                </ul>             
                            </li>               
                            <li><a id="botonMenu" href="{{ url('/chat') }}">Debates</a></li>
                            <li><a id="botonMenu" href="{{ url('/noticias') }}">Noticias</a>
                                @if( Auth::user() && Auth::user()->rol == 'Admin' )
                                <ul>
                                    <li><a id="botonMenu" href="{{ url('/noticias/crear') }}">Crear noticia</a></li>
                                </ul> 
                                @endif
                            </li>
                        </ul>

                            <li><a id="botonMenu" href="{{ url('/chat') }}">Noticias</a></li>
                        @endif
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a id="botonMenu" href="{{ url('/noticias') }}">Noticias</a>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/denuncia.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/noticia.js') }}"></script>
    </body>

</html>
