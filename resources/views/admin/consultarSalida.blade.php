@extends('layouts.admin')

@section('title')
<section>
	<div class="form-inline">
		<div class="form-group">
			<div class="input-group">
      			<div class="input-group-addon"><i class="fa fa-search"></i></div>
      			<input type="text" name="codigoAlm" size="50" id="filter" class="form-control" placeholder="Buscar" autofocus>
    		</div>
		</div>   
		<a href="{{url('/registrarSalida')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Consultar Salida</a>
	</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-search"></i> Consultar Salida</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Catálogo de Salidas</b></h3>
		</div>
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Fecha</th>
						<th>Empleado</th>
						<th>Acciones</th>
					</tr>	
				</thead>
				<tbody class="searchable">
				@foreach($salidas as $s)
					<tr>
						<td><b>{{$s->id_salida}}</b></td>
						<td>{{$s->fecha}}</td>
						<td>{{$s->nombre}}</td>
						<td>
							<a href="{{url('detalleSalida')}}/{{$s->id_salida}}" class="btn btn-info"><i class="fa fa-list-alt"></i></a>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div> <!--Modal para confirmar la eliminación de un registro-->
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
	//Filtro de salidas.
	$('#filter').keyup(function () 
	{
		var rex = new RegExp($(this).val(), 'i');
	    $('.searchable tr').hide();
	    $('.searchable tr').filter(function () 
	    {
	        return rex.test($(this).text());
	    }).show();
	});
});
</script>	
@stop