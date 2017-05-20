@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Registrar Categoria</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Registrar Categoria</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('/guardarCategoria')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" placeholder="Teclea la descripcion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop