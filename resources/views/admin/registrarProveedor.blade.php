@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Registrar Proveedor</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Registrar Proveedor</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="{{url('/guardarProveedor')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!--<div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" placeholder="Teclea el ID" class="form-control" required>
                </div>-->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" placeholder="Teclea el email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input name="direccion" type="text" placeholder="Tecla la dirección" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono:</label>
					<input name="telefono" type="text" placeholder="Tecla el teléfono" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop