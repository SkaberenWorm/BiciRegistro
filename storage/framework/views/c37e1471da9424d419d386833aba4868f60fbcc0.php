<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/vnd.microsoft.icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Biciregistro</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script type="text/javascript" language="javascript"  src="<?php echo e(asset('js/jquery-3.3.1.js')); ?>"></script>
    <script type="text/javascript" language="javascript"  src="<?php echo e(asset('js/jquery.dataTables.min.js')); ?>" ></script>
    <script type="text/javascript" language="javascript" defer src="<?php echo e(asset('js/dataTables.bootstrap4.min.js')); ?>"></script>



    <!-- Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"-->
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" defer rel="stylesheet">
    <link href="<?php echo e(asset('css/jquery-ui.css')); ?>" defer rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"  rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"  rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css"  rel="stylesheet">


    <!-- Styles -->
  	<link defer rel="stylesheet" type="text/css" href="<?php echo e(asset('css/dataTables.bootstrap4.min.css')); ?>">
    <link  defer href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <!-- Fonts -->
    <!--link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"-->
    <link href="<?php echo e(asset('css/font.css')); ?>" defer rel="stylesheet">


</head>
<body style="overflow-x:hidden;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
              <a class="navbar-brand  py-0 my-0" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/logoDuoc.jpg')); ?>" height="30" class="d-inline-block align-top mx-auto" alt="">
                <p class="text-center py-0 my-0 text-secondary">BiciRegistro</p>
              </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ">
                      <li class="nav-item dropdown">
                      <?php if(\Shinobi::can('vehiculos.index') || \Shinobi::can('duenos.index') || \Shinobi::can('roles.index') || \Shinobi::can('users.index')): ?>
                         <a class="nav-link dropdown-toggle <?php echo e(strpos(request()->path(),'ehiculos') || strpos(request()->path(),'uenos')|| strpos(request()->path(),'sers')|| strpos(request()->path(),'oles')? 'active': ''); ?>"
                         href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Administración
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <?php if (\Shinobi::can('vehiculos.index')): ?>
                           <a class="dropdown-item <?php echo e(strpos(request()->path(),'ehiculos')? 'active': ''); ?>" href="<?php echo e(route('vehiculos.index')); ?>">Bicicletas</a>
                           <?php endif; ?>
                           <?php if (\Shinobi::can('duenos.index')): ?>
                           <a class="dropdown-item <?php echo e(strpos(request()->path(),'uenos')? 'active': ''); ?>" href="<?php echo e(route('duenos.index')); ?>">Dueños</a>
                           <?php endif; ?>
                           <?php if (\Shinobi::can('users.index')): ?>
                           <a class="dropdown-item <?php echo e(strpos(request()->path(),'sers')? 'active': ''); ?>" href="<?php echo e(route('users.index')); ?>">Usuarios</a>
                           <?php endif; ?>
                           <?php if (\Shinobi::can('roles.index')): ?>
                           <a class="dropdown-item <?php echo e(strpos(request()->path(),'oles')? 'active': ''); ?>" href="<?php echo e(route('roles.index')); ?>">Roles</a>
                           <?php endif; ?>
                         </div>
                         <?php endif; ?>
                        </li>
                        <?php if (\Shinobi::can('registros.index')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(strpos(request()->path(),'egistro')? 'active': ''); ?>" href="<?php echo e(route('registro.index')); ?>">Registrar entrada y salida</a>
                        </li>
                        <?php endif; ?>
                        <?php if (\Shinobi::can('registros.tercero')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(strpos(request()->path(),'erceros')? 'active': ''); ?>" href="<?php echo e(route('registro.crearCodigoTercero')); ?>">Retiro por terceros</a>
                        </li>
                        <?php endif; ?>
                        <?php if (\Shinobi::can('registros.reporte')): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(strpos(request()->path(),'ortes')? 'active': ''); ?>" href="<?php echo e(route('registro.reporte')); ?>">Reportes</a>
                        </li>
                        <?php endif; ?>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>">Ingresar</a>
                            </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                        <a class="dropdown-item" href="<?php echo e(route('users.miPerfil')); ?>">
                            <?php echo e(__('Configurar perfil')); ?>

                        </a>


                          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              <?php echo e(__('Cerrar sesión')); ?>

                          </a>


                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                              <?php echo csrf_field(); ?>
                          </form>
                      </div>

                  </li>
                            <!--li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li-->
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <?php if(session('success')): ?>
            <div class="message px-3 py-2" role="alert" style="background-color: #00c851;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  <?php echo e(session('success')); ?></b>
            </div>
          <?php endif; ?>
          <?php if(isset($success)): ?>
            <div class="message px-3 py-2" role="alert" style="background-color: #00c851;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  <?php echo e($success); ?></b>
            </div>
          <?php endif; ?>
          <?php if(session('info')): ?>
            <div class="message px-3 py-2" role="alert" style="background-color: #33b5e5;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  <?php echo e(session('info')); ?></b>
            </div>
          <?php endif; ?>
          <?php if(isset($info)): ?>
            <div class="message px-3 py-2" role="alert" style="background-color: #33b5e5;">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4">  <?php echo e($info); ?></b>
            </div>
          <?php endif; ?>
          <?php if(isset($danger)): ?>
            <div class="message px-3 py-2" role="alert" style="background-color:#F00 !important">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4"> <?php echo e($danger); ?></b>
            </div>
          <?php endif; ?>
          <?php if(session('danger')): ?>
            <div class="message px-3 py-2" role="alert" style="background-color:#F00 !important">
              <button type="button" class="closeInfo close">
                <span aria-hidden="true"><b>×</b></span>
              </button>
              <b class="pr-4"> <?php echo e(session('danger')); ?></b>
            </div>
          <?php endif; ?>


            <?php echo $__env->yieldContent('content'); ?>
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
        top:74px;
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
