<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/contacto.css")}}">
        <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
        <title>SCI: Sistema de Control de Inventario</title>
    </head>
    <body>
     @include('layouts.navbar')
        <section class="container contacto">
         <h2><b>Contacto</b></h2><br>
            <form form="formContacto" method="POST" action="{{url('/enviarMensaje')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> <!--Es usado para proteger a los formularios de la aplicación de ataques de tipo CSRF-->
                <div class="form-group">
                    <label for="inputNombre">Nombre</label>
                    <input type="text" id="nombre" class="form-control" placeholder="Teclea el nombre" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Correo Electr&oacute;nico</label>
                    <input type="email" id="email" class="form-control" placeholder="Teclea el correo electr&oacute;nico" required>
                </div>
                 <div class="form-group">
                    <label for="textareaMensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="5" class="form-control" placeholder="Teclea el mensaje" required></textarea>
                </div>
                <button class="btn btn-lg btn-success" type="submit">Enviar</button>
            </form>
        </section>
        <br>
        <script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
        <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <body>
</html>