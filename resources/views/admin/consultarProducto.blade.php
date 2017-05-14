@extends('layouts.admin')

@section('title')
<section>
	<div class="form-inline">
		<div class="form-group">
			<div class="input-group">
      			<div class="input-group-addon"><i class="fa fa-search"></i></div>
      			<input type="text" name="codigoProd" id="filter" class="form-control" placeholder="Buscar" autofocus>
    		</div>
		</div>   
		<a href="{{url('/producto/create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Registrar</a>
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
						<th><i class="fa fa-cog"></i></th>
					</tr>	
				</thead>
				<tbody class="searchable">
					<tr>
						<td><b>1</b></td>
						<td>Cuaderno</td>
						<td>18</td>
						<td>Doble raya 100 hojas</td>	
						<td>Rayas</td>	
						<td>Scribe</td>
						<td>
                            <a href="#editarproducto" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="eliminarproducto" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
					</tr>
					<tr>
						<td><b>2</b></td>
						<td>Cuaderno</td>
						<td>20</td>
						<td>Cuadriculada 100 hojas</td>	
						<td>Cuadriculada</td>	
						<td>Scribe</td>
						<td>
                            <a href="#editarproducto" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                            <a href="eliminarproducto" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>	
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
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