@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Modificar Categoria</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Modificar Categoria</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('actualizarAlmacen')}}/{{$almacen->id_almacen}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" value="{{$almacen->id_almacen}}" placeholder="Teclea el ID" disabled class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" value="{{$almacen->nombre}}" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input name="direccion" type="text" value="{{$almacen->direccion}}" placeholder="Teclea la direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="capacidad">Capacidad:</label>
                    <input name="capacidad" type="number" value="{{$almacen->capacidad}}" placeholder="Teclea la capacidad" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop