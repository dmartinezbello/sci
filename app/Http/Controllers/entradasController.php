<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proveedor;
use App\Producto;
use App\Entrada;
use App\Almacen;
use App\Stock;
use App\Detalle_Entrada;
use Carbon\Carbon;
use DB;

class entradasController extends Controller
{

    public function detalleEntrada($id)
    {
        $entrada=Entrada::find($id);
        $empleado=DB::table('Empleado')
        ->select('nombre','apellido')
        ->where('id_empleado',$entrada->id_empleado)
        ->first();
        $detalleentrada=DB::table('Detalle_Entrada')
        ->join('Producto','Detalle_Entrada.id_producto', '=', 'Producto.id_producto')
        ->select('Detalle_Entrada.id_producto AS id_producto','Producto.nombre AS nombre', 'Detalle_Entrada.cantidad AS cantidad', 'Producto.precio AS precio')
        ->where('Detalle_Entrada.id_entrada',$id)
        ->orderBy('Detalle_Entrada.id_producto')
        ->get();
        return view('admin.detalleEntrada', compact('entrada','empleado','detalleentrada'));
    }
    public function registrarEntrada()
    {
    	//Obtener la última Entrada registrada.
    	/*$noEntrada = DB::table('Entrada')
    	->orderBy('id_entrada', 'desc')
    	->select('id_entrada')
    	->first();*/

        //Obtener todos los almacenes.
        $almacenes = DB::table('Almacen')
        ->select('id_almacen', 'nombre')
        ->get();

    	//Cuando no existen Entradas registradas por defecto el noEntrada es 1.
    	/*if ($noEntrada == "") 
    	{
    		$noEntrada = 1;
    	}*/

        /*<div class="col-md-3 form-group">
            <label for="noEntrada">No. Entrada:</label>
            <input name="noEntrada" type="text" value="{{noEntrada}}" class="form-control" readonly>
        </div>*/
    	
    	//Obtener la fecha que se realiza la Entrada. 
    	$fecha = Carbon::now();
       	$fecha = $fecha->format('d-m-Y'); 

    	return view('admin.registrarEntrada', compact('almacenes', 'fecha'));
    }

    public function obtenerEntrada()
    {
        $id=$_GET['id'];

        $producto=Producto::find($id); 

        //Aquí marca error cuando no se encuentra el producto. Intenta enviar el nombre y precio de un producto que no existe. Validar si la consulta fue exitosa.
        return response()->json(['nombre' => $producto->nombre,
                                 'precio' => $producto->precio]);
    }

    public function guardarEntrada()
    {
        //Esto si funciona.
        $productos=$_POST['prod']; //Array
        $observaciones=$_POST['obser']; //Array;
        $cantidad=$_POST['cant']; 
        $almacen=$_POST['alm'];

        //Fecha de la Entrada...Esto si funciona
        $fecha = Carbon::now();

        //Guardamos la Entrada...Esto si funciona
        $entrada = new Entrada();
        $entrada->observaciones = $observaciones;
        $entrada->id_empleado = Auth::user()->id_empleado; 
        $entrada->fecha = $fecha;
        $entrada->save();

        //Obtenemos el id de la Entrada creada..Esto si funciona
        $id_entrada = DB::table('Entrada')
        ->orderBy('id_entrada', 'desc')
        ->select('id_entrada')
        ->first();

        //dd($id_entrada);

        //Número de productos...
        $longitud = count($productos);

        //Insertamos el detalle de la Entrada...
        for ($i=0; $i <$longitud; $i++) 
        { 
            $detalle_entrada = new Detalle_Entrada();
            $detalle_entrada->id_producto=$productos[$i];
            $detalle_entrada->cantidad=$cantidad[$i];
            $detalle_entrada->id_entrada=$id_entrada->id_entrada;
            $detalle_entrada->save();

            //Aumentar el stock de productos...

            $stock=Stock::where('id_producto', $productos[$i])
          ->where('id_almacen', $almacen)
          ->first();

            $stock->cantidad=$stock->cantidad+$cantidad[$i];
            $stock->save();
        }
        
       return response()->json([
            'id' => $id_entrada->id_entrada
        ]);
    }
}
