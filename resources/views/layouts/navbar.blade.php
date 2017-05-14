<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-options">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/')}}">SCI</a>
    </div>
    <div id="navbar-options" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{url('/')}}">Inicio</a></li>
        @if (Auth::guest())
          <li><a href="{{url('/iniciarSesion')}}">Iniciar sesión</a></li>
          <li><a href="{{url('/registrarse')}}">Registrarse</a></li>
        @else
          <li><a href="{{url('/admin')}}">{{ Auth::user()->nombre }}</a></li>
          <li><a href="{{url('/logout')}}">Cerrar sesión</a></li>     
        @endif
      </ul>
    </div>
  </div>
</nav> 