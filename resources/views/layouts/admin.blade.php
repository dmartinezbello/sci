<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/skin-blue.min.css")}}">
    <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
    <title>SCI: Sistema de Control de Inventario</title>
  </head>
  <body>
  <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="{{url('/admin')}}" class="logo">
      <span class="logo-mini"><b>S</b>CI</span>
      <span class="logo-lg"><b>Sistema </b>SCI</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        @if (Auth::guest())
        <ul class="nav navbar-nav">
          <li><a href="{{url('/iniciarSesion')}}">Iniciar sesión</a></li>
          <li><a href="{{url('/registrarse')}}">Registrarse</a></li>
        </ul>
        @else
        <ul class="nav navbar-nav">          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/user.png" class="user-image" alt="Usuario">
              <span class="hidden-xs">{{ Auth::user()->nombre }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="img/user.png" class="img-circle" alt="Usuario">
                <p>
                  {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                  <small>Fecha: 12/05/2017</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{url('/logout')}}" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
        @endif 
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/user.png" class="img-circle" alt="Usuario">
        </div>
        <div class="pull-left info">
          @if (Auth::guest())
          <a href="{{url('/iniciarSesion')}}">Iniciar sesión</a>
          @else
          
            {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
            <br>
            <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
          
          @endif 
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">PANEL DE CONTROL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/consultarProducto')}}"><i class="fa fa-search"></i>Consultar producto</a></li>
            <li><a href="{{url('/registrarProducto')}}"><i class="fa fa-plus"></i>Registrar producto</a></li>
            <!--<li><a href="{{url('/modificarProducto')}}"><i class="fa fa-pencil"></i>Modificar producto</a></li>-->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Entradas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#registrarentrada"><i class="fa fa-plus"></i>Registrar entrada</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-reply"></i> <span>Salidas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#registrarsalida"><i class="fa fa-plus"></i>Registrar salida</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Devoluciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#registradevolucion"><i class="fa fa-plus"></i>Registrar devolución</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#reporteinventario"><i class="fa fa-file"></i>Reporte de inventario</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header"> 
      @yield('title') <!--Aquí va el título de la página-->
      <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}"><i class="fa fa-home"></i>Inicio</a></li>
        @yield('breadcrumbs') <!--Aquí van los breadcrumbs-->
      </ol>
    </section>
    <section class="content"> 
      @yield('content') <!--Aquí va nuestro contenido-->
    </section>
  </div>
  <footer class="main-footer">
   <strong>&copy; Ingeniería Web 2017</strong>
  <div class="pull-right">
    <a href="https://github.com/jgmn/sci" target="_blank"><i class="fa fa-github"></i><b> Proyecto en Github</b></a>
  </div>
  </footer>
  </div>
  <script src="{{asset("js/jquery-2.2.3.min.js")}}"></script>
  <script src="{{asset("js/bootstrap.min.js")}}"></script>
  <script src="{{asset("js/app.min.js")}}"></script>
  <script src="{{asset("js/jquery.slimscroll.min.js")}}"></script>
  <script src="{{asset("js/fastclick.min.js")}}"></script>
  @yield('script') <!--Aquí va nuestros scripts-->
  </body>
</html>
