<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/iniciarsesion.css")}}">
    <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
    <title>SCI: Sistema de Control de Inventario</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container text-center titulo">
        <h2><b>Iniciar sesi&oacute;n</b></h2><br>
    </div>
    @if(Session::has('mensaje_error'))
    {{ Session::get('mensaje_error') }}
    @endif
    <section class="container form-iniciar-sesion">
        <form name="formIniciarSesion" method="POST" action="{{url('/entrarSistema')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> 
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input name="usuario" type="text" placeholder="Teclea el usuario" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input name="contrasena" type="password" placeholder="Teclea la contraseña" class="form-control" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesi&oacute;n</button>
        </form>
    </section>
    <br>
    <script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <body>
</html>