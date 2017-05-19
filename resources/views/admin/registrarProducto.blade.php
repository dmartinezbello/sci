@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Registrar Producto</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Registrar producto</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('/guardarProducto')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" placeholder="Teclea el ID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" placeholder="Teclea el nombre del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input name="precio" type="text" placeholder="Teclea el precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" placeholder="Tecla la descripción del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
					<select name="categoria" class="form-control" required>
						<option value="" selected>Selecciona una categoría</option>
						@foreach($categorias as $c)
						<option value="{{$c->id_categoria}}">{{$c->nombre}}</option>
						@endforeach
					</select>
                </div>
                <div class="form-group">
                	<label for="proveedor">Proveedor:</label>
                	<select name="proveedor" class="form-control" required>
						<option value="" selected>Selecciona un proveedor</option>
						@foreach($proveedores as $p)
						<option value="{{$p->id_proveedor}}">{{$p->nombre}}</option>
						@endforeach
					</select>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop