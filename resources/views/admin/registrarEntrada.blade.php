@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Registro de Entradas de Almacén</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Entrada Almacén</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
            <form action="" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="noEntrada">No. Entrada:</label>
                        <input name="noEntrada" type="text" value="{{$noEntrada}}" class="form-control" readonly>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="text" value="{{$fecha}}" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea name="observaciones" placeholder="Teclea las observaciones de la Entrada" class="form-control"></textarea> 
                </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="producto">Producto:</label>
                            <input type="text" name="producto" placeholder="Teclea el ID del producto" class="form-control">
                        </div>
                         <div class="col-md-3 form-group">
                            <label for="accion">Acción</label><br>
                            <a href="#" class="btn btn-primary">Agregar</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Producto</th>
                                <th>Cantidad Pedida</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop
