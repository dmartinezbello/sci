@extends('layouts.admin')

@section('title')
<section>
	<div class="form-inline">
		<div class="form-group">
			<div class="input-group">
      			<div class="input-group-addon"><i class="fa fa-search"></i></div>
      			<input type="text" name="codigoProv" size="50" id="filter" class="form-control" placeholder="Buscar" autofocus>
    		</div>
		</div>   
		<a href="{{url('/registrarProveedor')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Proveedor</a>
	</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-search"></i> Consultar proveedor</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Lista de Proveedores</b></h3>
		</div>
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Dirección</th>	
						<th>Telefono</th>
					</tr>	
				</thead>
				<tbody class="searchable">
				@foreach($proveedores as $p)
					<tr>
						<td><b>{{$p->id_proveedor}}</b></td>
						<td>{{$p->nombre}}</td>
						<td>{{$p->email}}</td>
						<td>{{$p->direccion}}</td>
						<td>{{$p->telefono}}</td>
						<td>
                            <a href="{{url('modificarProveedor')}}/{{$p->id_proveedor}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-proveedor_id="{{$p->id_proveedor}}" data-proveedor_nombre="{{$p->nombre}}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" aria-label="Left Align"><i class="fa fa-trash-o"></i></button>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@include('admin.eliminarProveedor') <!--Modal para confirmar la eliminación de un registro-->
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
	//Filtro de proveedores.
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
        var proveedorId = $(e.relatedTarget).data('proveedor_id');
        var proveedorNombre = $(e.relatedTarget).data('proveedor_nombre');
	    $("#confirmDelete #proveedor_nombre > b").text(" " + proveedorNombre );
	    $("#delForm").attr('action', 'eliminarProveedor/' + proveedorId); 
	});
});
</script>	
@stop