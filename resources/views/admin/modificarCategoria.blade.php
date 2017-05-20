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
            <form action="{{url('actualizarCategoria')}}/{{$categoria->id_categoria}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input name="id" type="text" value="{{$categoria->id_categoria}}" placeholder="Teclea el ID" disabled class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" value="{{$categoria->nombre}}" placeholder="Teclea el nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" value="{{$categoria->descripcion}}" placeholder="Teclea la descripcion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Aceptar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop