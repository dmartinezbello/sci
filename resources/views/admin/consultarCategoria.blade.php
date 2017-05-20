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
		<a href="{{url('/registrarCategoria')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Categoria</a>
	</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-search"></i> Consultar categoria</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><b>Lista de Categorias</b></h3>
		</div>
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Descripción</th>
					</tr>	
				</thead>
				<tbody class="searchable">
				@foreach($categorias as $c)
					<tr>
						<td><b>{{$c->id_categoria}}</b></td>
						<td>{{$c->nombre}}</td>
						<td>{{$c->descripcion}}</td>
						<td>
                            <a href="{{url('modificarCategoria')}}/{{$c->id_categoria}}" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <button type="button" data-categoria_id="{{$c->id_categoria}}" data-categoria_nombre="{{$c->nombre}}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete" aria-label="Left Align"><i class="fa fa-trash-o"></i></button>
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@include('admin.eliminarCategoria') <!--Modal para confirmar la eliminación de un registro-->
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
	//Filtro de categoriaes.
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
        var categoriaId = $(e.relatedTarget).data('categoria_id');
        var categoriaNombre = $(e.relatedTarget).data('categoria_nombre');
	    $("#confirmDelete #categoria_nombre > b").text(" " + categoriaNombre );
	    $("#delForm").attr('action', 'eliminarCategoria/' + categoriaId); 
	});
});
</script>	
@stop