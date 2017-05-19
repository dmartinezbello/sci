@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Modificar Proveedor</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Modificar Proveedor</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('actualizarProveedor')}}/{{$proveedor->id_proveedor}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" value="{{$proveedor->id_proveedor}}" placeholder="Teclea el ID" disabled class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" value="{{$proveedor->nombre}}" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" value="{{$proveedor->email}}" placeholder="Teclea el email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input name="direccion" type="text" value="{{$proveedor->direccion}}" placeholder="Tecla la dirección" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
					<input name="telefono" type="text" value="{{$proveedor->telefono}}" placeholder="Tecla el teléfono" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop