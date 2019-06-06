<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Biciregistro</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" language="javascript"  src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" language="javascript"  src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>
    <script type="text/javascript" language="javascript" defer src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>



    <!-- Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"-->
    <link href="{{ asset('css/select2.min.css') }}" defer rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" defer rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"  rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"  rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css"  rel="stylesheet">


    <!-- Styles -->
  	<link defer rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link  defer href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"-->
    <link href="{{ asset('css/font.css') }}" defer rel="stylesheet">


</head>
<body style="overflow-x:hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              <a class="navbar-brand" href="#">
                <!--img src="{{ asset('images/favicon.ico') }}" width="30" height="30" class="d-inline-block align-top" alt=""-->
                Biciregistro
              </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">
                      <li class="nav-item dropdown">
                      @if (\Shinobi::can('vehiculos.index') || \Shinobi::can('duenos.index') || \Shinobi::can('roles.index') || \Shinobi::can('users.index'))
                         <a class="nav-link dropdown-toggle {{ strpos(request()->path(),'ehiculos') || strpos(request()->path(),'uenos')|| strpos(request()->path(),'sers')|| strpos(request()->path(),'oles')? 'active': ''}}"
                         href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Administración
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @can('vehiculos.index')
                           <a class="dropdown-item {{ strpos(request()->path(),'ehiculos')? 'active': ''}}" href="{{ route('vehiculos.index') }}">Bicicletas</a>
                           @endcan
                           @can('duenos.index')
                           <a class="dropdown-item {{ strpos(request()->path(),'uenos')? 'active': ''}}" href="{{ route('duenos.index') }}">Dueños</a>
                           @endcan
                           @can('users.index')
                           <a class="dropdown-item {{ strpos(request()->path(),'sers')? 'active': ''}}" href="{{ route('users.index') }}">Usuarios</a>
                           @endcan
                           @can('roles.index')
                           <a class="dropdown-item {{ strpos(request()->path(),'oles')? 'active': ''}}" href="{{ route('roles.index') }}">Roles</a>
                           @endcan
                         </div>
                         @endif
                        </li>
                        @can('registros.index')
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(request()->path(),'egistro')? 'active': ''}}" href="{{ route('registro.index') }}">Registrar entrada y salida</a>
                        </li>
                        @endcan
                        @can('registros.tercero')
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(request()->path(),'erceros')? 'active': ''}}" href="{{route('registro.crearCodigoTercero')}}">Retiro por terceros</a>
                        </li>
                        @endcan
                        @can('registros.reporte')
                        <li class="nav-item">
                            <a class="nav-link {{ strpos(request()->path(),'ortes')? 'active': ''}}" href="{{route('registro.reporte')}}">Reportes</a>
                        </li>
                        @endcan

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          @if(session('success'))
            <div class="message px-3 py-2" role="alert" style="background-color: #00c851;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  {{session('success')}}</b>
            </div>
          @endif
          @if(isset($success))
            <div class="message px-3 py-2" role="alert" style="background-color: #00c851;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  {{$success}}</b>
            </div>
          @endif
          @if(session('info'))
            <div class="message px-3 py-2" role="alert" style="background-color: #33b5e5;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  {{session('info')}}</b>
            </div>
          @endif
          @if(isset($info))
            <div class="message px-3 py-2" role="alert" style="background-color: #33b5e5;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  {{$info}}</b>
            </div>
          @endif
          @if(isset($danger))
            <div class="message px-3 py-2" role="alert" style="background-color:#F00 !important">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4"> {{$danger}}</b>
            </div>
          @endif
          @if(session('danger'))
            <div class="message px-3 py-2" role="alert" style="background-color:#F00 !important">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4"> {{session('danger')}}</b>
            </div>
          @endif


            @yield('content')
        </main>
    </div>
    <style media="screen">
      .modal-dialog.modal-success .modal-header {
        background-color: #00c851;
        color: white;
      }
      .message{
        position: absolute;
        z-index: 999;
        border-radius: 3px;

        color: #FFF !important;
        top:55px;
        right: 0px;
        max-width: 550px;
        min-width: 300px;
      }
      .dropdown-menu{
        margin-top: 0px;
      }
      .dropdown:hover>.dropdown-menu {
        display: block;
      }
      .table-small td,
      .table-small th{
        padding:.5rem
      }
      .btn-default{
        color: #212529;
        background-color: #f8f9fa;
        border-color: #e8e9ea;
      }
      .btn-default:hover{
        color: #212529;
        background-color: #ddd;
        border-color: #e8e9ea;
      }
    </style>
    <script type="text/javascript">
      $('.message').animate({opacity: "100"},6000);
      $('.message').animate({right: "10px"},500);
      $('.message').animate({right: "-550px"},800);
      $('.message').hide(1);
      $('.message').click(function(){
        $('.message').stop();
      });
      $(".closeInfo").click(function(){
        $('.message').hide();
      });

    </script>
</body>

</html>
