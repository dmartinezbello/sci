<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/registrarse.css")}}">
        <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
        <title>SCI: Sistema de Control de Inventario</title>
    </head>
    <body>
        @include('layouts.navbar')
        <section class="container registrarse">
            <h2><b>Registrarse</b></h2><br>
            <form action="{{url('/guardarEmpleado')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input name="apellido" type="text" placeholder="Teclea el apellido" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input name="usuario" type="text" placeholder="Teclea el usuario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input name="contrasena" type="password" placeholder="Tecla la contraseña" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" class="form-control" required>
                        <option value="" selected>Selecciona un tipo</option>
                        <option value="0">Administrador</option>
                        <option value="1">Productos</option>
                        <option value="2">Entradas</option>
                        <option value="3">Salidas</option>
                        <option value="4">Almacenes</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
            </form>
        </section>
        <br>
        <script src="{{asset("js/jquery-2.2.3.min.js")}}"></script>
        <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <body>
</html>

