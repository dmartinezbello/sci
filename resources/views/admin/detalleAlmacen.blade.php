@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Detalle de Almacen</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-list-alt"></i> Detalle de Almacen</li>
@stop

@section('content')
<section>
	<div class="box">
    	<div class="box-body">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="almacen">Almacen:</label>
                    <input name="almacen" type="text" value="{{$almacen->nombre}}" class="form-control" readonly>
                    </div>
                        <div class="col-md-3 form-group">
                            <label for="capacidad">Capacidad:</label>
                            <input type="text" name="capacidad" value="{{$almacen->capacidad}}" class="form-control" readonly>
                        </div>
            </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>    
                        </tr>   
                    </thead>
                    <tbody>
                    @foreach($stock as $s)
                        <tr>
                            <td><b>{{$s->id_producto}}</b></td>
                            <td>{{$s->nombre_producto}}</td>
                            <td>{{$s->precio}}</td>
                            <td>{{$s->cantidad}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    	</div>
	</div>
</section>
@stop