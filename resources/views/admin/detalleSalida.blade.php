@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Detalle de Salida</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-list-alt"></i> Detalle de Salida</li>
@stop

@section('content')
<section>
	<div class="box">
    	<div class="box-body">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="fecha">Fecha:</label>
                    <input name="fecha" type="text" value="{{$salida->fecha}}" class="form-control" readonly>
                    </div>
                        <div class="col-md-3 form-group">
                            <label for="almacen">Empleado:</label>
                            <input type="text" name="empleado" value="{{$empleado->nombre}} {{$empleado->apellido}}" class="form-control" readonly>
                        </div>
                    <div class="col-md-6 form-group">
                        <label for="observaciones">Observaciones:</label>
                    <div name="observaciones">{{$salida->observaciones}}</div>
                </div>
            </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>    
                            <th>Total</th>
                        </tr>   
                    </thead>
                    <tbody>
                    @foreach($detallesalida as $d)
                        <tr>
                            <td><b>{{$d->id_producto}}</b></td>
                            <td>{{$d->nombre}}</td>
                            <td>{{$d->precio}}</td>
                            <td>{{$d->cantidad}}</td>
                            <td>{{$d->cantidad*$d->precio}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    	</div>
	</div>
</section>
@stop