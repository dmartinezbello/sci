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
		<a href="{{url('/registrarAlmacen')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Almacén</a>
	</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-search"></i> Consultar almacén</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Catálogo de Almacenes</b></h3>
		</div>
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Dirección</th>
						<th>Capacidad</th>
					</tr>	
				</thead>
				<tbody class="searchable">
				@foreach($almacenes as $index => $a)
					<tr>
						<td><b>{{$a->id_almacen}}</b></td>
						<td>{{$a->nombre}}</td>
						<td>{{$a->direccion}}</td>
						<td>{{$a->capacidad}}</td>
						<td>
							<a href="{{url('detalleAlmacen')}}/{{$a->id_almacen}}" class="btn btn-info"><i class="fa fa-list-alt"></i></a>
                            <a href="{{url('modificarAlmacen')}}/{{$a->id_almacen}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-almacen_id="{{$a->id_almacen}}" data-almacen_nombre="{{$a->nombre}}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" aria-label="Left Align"><i class="fa fa-trash-o"></i></button>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@include('admin.eliminarAlmacen') <!--Modal para confirmar la eliminación de un registro-->
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
	//Filtro de almacenes.
	$('#filter').keyup(function () 
	{
		var rex = new RegExp($(this).val(), 'i');
	    $('.searchable tr').hide();
	    $('.searchable tr').filter(function () 
	    {
	        return rex.test($(this).text());
	    }).show();
	});

	//Asignación dinámica del producto a eliminar en el modal.
	$('#confirmDelete').on('show.bs.modal', function(e)
	{
        var almacenId = $(e.relatedTarget).data('almacen_id');
        var almacenNombre = $(e.relatedTarget).data('almacen_nombre');
	    $("#confirmDelete #almacen_nombre > b").text(" " + almacenNombre );
	    $("#delForm").attr('action', 'eliminarAlmacen/' + almacenId); 
	});
});
</script>	
@stop