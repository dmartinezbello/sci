<?php

namespace App\Http\Controllers;
use App\Producto;
use DB;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function consultarProducto () 
    {
    	$productos = DB::table('Producto')
        ->join('Categoria','Categoria.id_categoria', '=', 'Producto.id_categoria')
        ->join('Proveedor','Proveedor.id_proveedor', '=', 'Producto.id_proveedor')
        ->select('Producto.*', 'Categoria.nombre AS nombre_categoria', 'Proveedor.nombre AS nombre_proveedor')
        ->get();

        return view('admin.consultarProducto', compact('productos'));
    }

    public function registrarProducto()
    {
    	return view('admin.registrarProducto');
    }

    public function guardarProducto(Request $datos)
    {
    	return 'Guardar producto pendiente';
    }
}
