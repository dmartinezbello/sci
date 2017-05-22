@extends('layouts.admin')

@section('title')
<section>
	<div class="box-header">
			<h3 class="box-title"><b>Registro de Salidas de Almacén</b></h3>
		</div>
</section>
@stop

@section('breadcrumbs')
<li class="active"><i class="fa fa-plus"></i> Salida Almacén</li>
@stop

@section('content')
<section>
	<div class="box">
		<div class="box-body">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="text" value="{{$fecha}}" class="form-control" readonly>
                    </div>
                      <div class="col-md-3 form-group">
                        <label for="almacen">Almacén:</label>
                        <select id="almacen" class="form-control">
                            <option value="" selected>Selecciona el almacén</option>
                            @foreach($almacenes as $a)
                                <option value="{{$a->id_almacen}}">{{$a->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                  
                    <div class="col-md-6 form-group">
                        <label for="observaciones">Observaciones:</label>
                        <textarea id="observaciones" name="observaciones" placeholder="Teclea las observaciones de la Salida (opcional)" class="form-control"></textarea> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="producto">Producto:</label>
                        <input id="producto" type="text" name="producto" placeholder="Teclea el ID del producto" class="form-control">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input id="cantidad" name="cantidad" placeholder="Teclea la cantidad pedida" class="form-control"></input> 
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
                <br><button id="guardar" class="btn btn-success">Guardar</button>
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
        var almacen=$("#almacen").val();
        
        if (cantprod=="" || idprod == "" || almacen=="") {
            alert('Captura el Almacen, Producto y la Cantidad');
        }
        else
        {
            $.ajax({
                    url:'./obtenerSalida',
                    type: 'GET',
                    data: {
                        id:idprod,
                        cantidad:cantprod,
                        alm:almacen
                }, success: function( response ) {
                    if(response.mensaje=="aprovado")
                    {
                    var tableRef = document.getElementById('tabla').getElementsByTagName('tbody')[0];

                    var newRow   = tableRef.insertRow(tableRef.rows.length);

                    var idCell  = newRow.insertCell(0);
                    var idText  = document.createTextNode(idprod);
                    idCell.appendChild(idText);

                    var nombreCell  = newRow.insertCell(1);
                    var nombreText  = document.createTextNode(response.nombre);
                    nombreCell.appendChild(nombreText);

                    var cantidadCell  = newRow.insertCell(2);
                    var cantidadText  = document.createTextNode(cantprod);
                    cantidadCell.appendChild(cantidadText);

                    var precioCell  = newRow.insertCell(3);
                    var precioText  = document.createTextNode(response.precio);
                    precioCell.appendChild(precioText);
                    
                    var totalCell  = newRow.insertCell(4);
                    var totalText  = document.createTextNode(cantprod*response.precio);
                    totalCell.appendChild(totalText);   
                    }
                    else{
                        alert(response.mensaje);
                    }
                }, error: function () {
                alert('No se encontró el producto.');
                    productos.push();
                    cantidades.push();
                }
            });
        
            $("#producto").val('');
            $("#cantidad").val('');
        }
    });

    //Falta enviar el almacen al que se le hace la salida y disminuir el stock del producto en el controlador.
    //Checar porque ajax regresa error si los productos se insertan bien en el detalle_salida.
    $("#guardar").click(function()
    { 
        var observaciones = $("#observaciones").val();
        var almacen = $("#almacen" ).val();


        if (almacen == "" || productos.length == 0) 
        {
            alert('Captura toda la información de la Salida.');
        }
        else
        {

            $.ajax({
                url: './guardarSalida',
                type: 'POST',
                cache:false,
                dataType: 'json',
                data: {
                    "_token":"{{ csrf_token() }}",
                    obser: observaciones,
                    prod: productos,
                    cant: cantidades,
                    alm: almacen
                }, success: function(response) {
                    alert('Salida registrada correctamente. Re direccionado al detalle.');
                    window.location.replace("./detalleSalida/"+response.id);
                }, error: function(xhr, status) {
                    alert('La Salida no se guardó correctamente.');
                }
            });
        }
    });
});
</script>   
@stop
