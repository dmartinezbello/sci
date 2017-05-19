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
            <form action="{{url('actualizarProducto')}}/{{$producto->id_producto}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" value="{{$producto->id_producto}}" placeholder="Teclea el ID" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" value="{{$producto->nombre}}" placeholder="Teclea el nombre del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input name="precio" type="number" value="{{$producto->precio}}" placeholder="Teclea el precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" value="{{$producto->descripcion}}" placeholder="Tecla la descripción del producto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select name="categoria" class="form-control" required>
                        @foreach($categorias as $c)
                            @if($c->id_categoria == $producto->id_categoria)
                                <option value="{{$c->id_categoria}}" selected>{{$c->nombre}}</option>
                            @else
                                <option value="{{$c->id_categoria}}">{{$c->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor:</label>
                    <select name="proveedor" class="form-control" required>
                        <option value="" selected>Selecciona un proveedor</option>
                        @foreach($proveedores as $p)
                            @if($p->id_proveedor == $producto->id_proveedor)
                                <option value="{{$p->id_proveedor}}" selected>{{$p->nombre}}</option>
                            @else
                                <option value="{{$p->id_proveedor}}">{{$p->nombre}}</option>
                            @endif
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