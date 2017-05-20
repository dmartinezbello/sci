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
            <form action="{{url('/guardarEntrada')}}" method="POST">
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
                    <div class="col-md-3 form-group">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" placeholder="Teclea el ID del proveedor" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea name="observaciones" placeholder="Teclea las observaciones (opcional)" class="form-control"></textarea> 
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="producto">Producto:</label>
                        <input id="producto" type="text" name="producto" placeholder="Teclea el ID del producto" class="form-control">
                    </div>
                     <div class="col-md-3 form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input id="cantidad" name="cantidad" placeholder="Teclea la cantidad pedida" class="form-control" required></input> 
                    </div>
                     <div class="col-md-2 form-group">
                        <label for="accion">Acción</label><br>
                        <a href="#" class="btn btn-primary" id="agregar">Agregar</a>
                    </div>
                </div>
                <table class="table table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Producto</th>
                            <th>Cantidad Pedida</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a>
            </form> 
		</div>
	</div>
</section>
@stop

@section('script')
<script>
$(document).ready(function () 
{
    var productos=[];
    var cantidades=[];
    $("#agregar").click(function()
    {
        var idprod= $("#producto").val();
        productos.push(idprod);
        var cantprod=$("#cantidad").val();
        cantidades.push(cantprod);

        $.get("obtenerEntrada/"+idprod+"",function(response){ 
        alert(response.nombre);
        });


        var tableRef = document.getElementById('tabla').getElementsByTagName('tbody')[0];

        // Insert a row in the table at the last row
        var newRow   = tableRef.insertRow(tableRef.rows.length);

        // Insert a cell in the row at index 0
        var idCell  = newRow.insertCell(0);
        var idText  = document.createTextNode(idprod);
        newCell.appendChild(newText);

        var nombreCell  = newRow.insertCell(1);
        var nombreText  = document.createTextNode('producto');
        nombreCell.appendChild(nombreText);

        var cantidadCell  = newRow.insertCell(2);
        var cantidadText  = document.createTextNode(cantprod);
        cantidadCell.appendChild(cantidadText);

        var precioCell  = newRow.insertCell(3);
        var precioText  = document.createTextNode('0');
        precioCell.appendChild(precioText);
        
        var totalCell  = newRow.insertCell(4);
        var totalText  = document.createTextNode('0');
        totalCell.appendChild(totalText);

        $("#producto").val('');
        $("#cantidad").val('');
    });

});
</script>   
@stop