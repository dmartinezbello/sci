<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proveedor;
use App\Producto;
use App\Salida;
use App\Almacen;
use App\Stock;
use App\Detalle_Salida;
use Carbon\Carbon;
use DB;

class salidasController extends Controller
{

    public function detalleSalida($id)
    {
        $salida=Salida::find($id);
        $empleado=DB::table('Empleado')
        ->select('nombre','apellido')
        ->where('id_empleado',$salida->id_empleado)
        ->first();
        $detallesalida=DB::table('Detalle_Salida')
        ->join('Producto','Detalle_Salida.id_producto', '=', 'Producto.id_producto')
        ->select('Detalle_Salida.id_producto AS id_producto','Producto.nombre AS nombre', 'Detalle_Salida.cantidad AS cantidad', 'Producto.precio AS precio')
        ->where('Detalle_Salida.id_salida',$id)
        ->orderBy('Detalle_Salida.id_producto')
        ->get();
        return view('admin.detalleSalida', compact('salida','empleado','detallesalida'));
    }
    public function registrarSalida()
    {
    	//Obtener la última Salida registrada.
    	/*$noSalida = DB::table('Salida')
    	->orderBy('id_salida', 'desc')
    	->select('id_salida')
    	->first();*/

        //Obtener todos los almacenes.
        $almacenes = DB::table('Almacen')
        ->select('id_almacen', 'nombre')
        ->get();

    	//Cuando no existen Salidas registradas por defecto el noSalida es 1.
    	/*if ($noSalida == "") 
    	{
    		$noSalida = 1;
    	}*/

        /*<div class="col-md-3 form-group">
            <label for="noSalida">No. Salida:</label>
            <input name="noSalida" type="text" value="{{noSalida}}" class="form-control" readonly>
        </div>*/
    	
    	//Obtener la fecha que se realiza la Salida. 
    	$fecha = Carbon::now();
       	$fecha = $fecha->format('d-m-Y'); 

    	return view('admin.registrarSalida', compact('almacenes', 'fecha'));
    }

    public function obtenerSalida()
    {
        $id=$_GET['id'];

        $producto=Producto::find($id); 

        //Aquí marca error cuando no se encuentra el producto. Intenta enviar el nombre y precio de un producto que no existe. Validar si la consulta fue exitosa.
        return response()->json(['nombre' => $producto->nombre,
                                 'precio' => $producto->precio]);
    }

    public function guardarSalida()
    {
        //Esto si funciona.
        $productos=$_POST['prod']; //Array
        $observaciones=$_POST['obser']; //Array;
        $cantidad=$_POST['cant']; 
        $almacen=$_POST['alm'];

        //Fecha de la Salida...Esto si funciona
        $fecha = Carbon::now();

        //Guardamos la Salida...Esto si funciona
        $salida = new Salida();
        $salida->observaciones = $observaciones;
        $salida->id_empleado = Auth::user()->id_empleado; 
        $salida->fecha = $fecha;
        $salida->save();

        //Obtenemos el id de la Salida creada..Esto si funciona
        $id_salida = DB::table('Salida')
        ->orderBy('id_salida', 'desc')
        ->select('id_salida')
        ->first();

        //dd($id_salida);

        //Número de productos...
        $longitud = count($productos);

        //Insertamos el detalle de la Salida...
        for ($i=0; $i <$longitud; $i++) 
        { 
            $detalle_salida = new Detalle_Salida();
            $detalle_salida->id_producto=$productos[$i];
            $detalle_salida->cantidad=$cantidad[$i];
            $detalle_salida->id_salida=$id_salida->id_salida;
            $detalle_salida->save();

            //Aumentar el stock de productos...

            $stock=Stock::where('id_producto', $productos[$i])
          ->where('id_almacen', $almacen)
          ->first();

            $stock->cantidad=$stock->cantidad-$cantidad[$i];
            $stock->save();
        }
        
       return response()->json([
            'id' => $id_salida->id_salida
        ]);
    }
}
