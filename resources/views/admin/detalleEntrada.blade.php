@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Detalle de Entrada</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-list-alt"></i> Detalle de Entrada</li>
@stop

@section('content')
<section>
	<div class="box">
    	<div class="box-body">
            <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="text" value="{{$entrada->fecha}}" class="form-control" readonly>
                    </div>
                      <div class="col-md-3 form-group">
                        <label for="almacen">Empleado:</label>
                        <input type="text" name="empleado" value="{{$empleado->nombre}} {{$empleado->apellido}}" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="observaciones">Observaciones:</label>
                        <div name="observaciones">{{$entrada->observaciones}}</div>
                    </div>
                </div>
            <div class="row">
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
                @foreach($detalleentrada as $d)
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
	</div>
</section>
@stop