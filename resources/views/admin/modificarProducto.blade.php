@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Modificar Producto</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-pencil"></i> Modificar producto</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('actualizarProducto')}}/{{$productos->id_producto}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" value="{{$productos->id_producto}}" placeholder="Teclea el ID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" value="{{$productos->nombre}}" placeholder="Teclea el nombre del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input name="precio" type="number" value="{{$productos->precio}}" placeholder="Teclea el precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" value="{{$productos->descripcion}}" placeholder="Tecla la descripcion del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
					<select name="categoria" class="form-control" required>
						<option value="" selected>Selecciona una categoría</option>
						@foreach($productos as $p)
						<option value="{{$p->id_categoria}}">{{$p->nombre_categoria}}</option>
						@endforeach
					</select>
                </div>
                <div class="form-group">
                	<label for="proveedor">Proveedor:</label>
                	<select name="proveedor" class="form-control" required>
						<option value="" selected>Selecciona un proveedor</option>
						@foreach($productos as $p)
						<option value="{{$p->id_proveedor}}">{{$p->nombre_proveedor}}</option>
						@endforeach
					</select>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/consultarProducto')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop