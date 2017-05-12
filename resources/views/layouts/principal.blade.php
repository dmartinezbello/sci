<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/principal.css")}}">
        <link rel="icon" type="image/x-icon" href="{{asset("img/itc.ico")}}">
        <title>SCI: Sistema de Control de Inventario</title>
    </head>
    <body>
        @include('layouts.navbar')
        @include('layouts.header')
        @include('layouts.footer')
        <script src="{{asset("js/jquery-3.2.1.min.js")}}"></script>
        <script src="{{asset("js/principal.js")}}"></script>
        <script src="{{asset("js/bootstrap.min.js")}}"></script>
    </body>
</html>