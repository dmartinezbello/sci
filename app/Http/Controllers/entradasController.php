<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Producto;
use App\Entrada;
use Carbon\Carbon;
use DB;

class entradasController extends Controller
{
    public function registrarEntrada()
    {
    	//Obtener la última Entrada registrada.
    	$noEntrada = DB::table('Entrada')
    	->orderBy('id_entrada', 'desc')
    	->select('id_entrada')
    	->first();

    	//Cuando no existen Entradas registradas por defecto el noEntrada es 1.
    	if ($noEntrada == null) 
    	{
    		$noEntrada = 1;
    	}
    	
    	//Obtener la fecha que se realiza la Entrada. 
    	$fecha = Carbon::now();
       	$fecha = $fecha->format('d-m-Y'); 

    	return view('admin.registrarEntrada', compact('fecha', 'noEntrada'));
    }

    public function obtenerEntrada($id)
    {
        //get nombre of Entrada by its id
        $ent=Entrada::find($id);

        //This works
        return response()->json(['nombre' => 'This is get method']);

        //This gives me error 500
        //return response()->json(['nombre' => $ent->nombre]);
    }
}
