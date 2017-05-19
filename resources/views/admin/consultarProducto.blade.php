@extends('layouts.admin')

@section('title')
<section>
	<div class="form-inline">
		<div class="form-group">
			<div class="input-group">
      			<div class="input-group-addon"><i class="fa fa-search"></i></div>
      			<input type="text" name="codigoProd" size="50" id="filter" class="form-control" placeholder="Buscar" autofocus>
    		</div>
		</div>   
		<a href="{{url('/registrarProducto')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Producto</a>
	</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-search"></i> Consultar producto</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Lista de Productos</b></h3>
		</div>
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripción</th>	
						<th>Categoría</th>
						<th>Proveedor</th>
						<th>Acciones</th>
					</tr>	
				</thead>
				<tbody class="searchable">
				@foreach($productos as $p)
					<tr>
						<td><b>{{$p->id_producto}}</b></td>
						<td>{{$p->nombre}}</td>
						<td>{{$p->precio}}</td>
						<td>{{$p->descripcion}}</td>
						<td>{{$p->nombre_categoria}}</td>
						<td>{{$p->nombre_proveedor}}</td>
						<td>
                            <a href="{{url('modificarProducto')}}/{{$p->id_producto}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-producto_id="{{$p->id_producto}}" data-producto_nombre="{{$p->nombre}}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" aria-label="Left Align"><i class="fa fa-trash-o"></i></button>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@include('admin.eliminarProducto') <!--Modal para confirmar la eliminación de un registro-->
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
	//Filtro de productos.
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
        var productoId = $(e.relatedTarget).data('producto_id');
        var productoNombre = $(e.relatedTarget).data('producto_nombre');
	    $("#confirmDelete #producto_nombre > b").text(" " + productoNombre );
	    $("#delForm").attr('action', 'eliminarProducto/' + productoId); 
	});
});
</script>	
@stop