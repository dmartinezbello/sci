<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
        <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
        <title>SCI: Sistema de Control de Inventario</title>
    </head>
    <body>
        @include('layouts.navbar')

        <br>
        <br>
        <div class="col-xs-12">
    <form action="{{url('/guardarEmpleado')}}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input name="nombre" type="text" placeholder="Teclea Nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input name="apellido" type="text" placeholder="Teclea Apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input name="usuario" type="text" placeholder="Teclea Usuario" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Contrasena:</label>
            <input name="contrasena" type="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
    </form>
</div>
        <br>
        <script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
        <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <body>
</html>

