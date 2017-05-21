<?php

namespace App\Http\Controllers;
use App\Almacen;
use App\Producto;
use App\Stock;
use DB;
use Illuminate\Http\Request;

class almacenesController extends Controller
{
    public function consultarAlmacen() 
    {
    	$almacenes = DB::table('Almacen')
      ->orderBy('id_almacen')
      ->get();

      return view('admin.consultarAlmacen', compact('almacenes'));
    }

    public function registrarAlmacen()
    {
    	return view('admin.registrarAlmacen');
    }

    public function modificarAlmacen($id)
    {
      $almacen=Almacen::find($id);
      return view('admin.modificarAlmacen', compact('almacen'));
    }

    public function actualizarAlmacen(Request $datos, $id)
    {
      $almacen=Almacen::find($id);
      $almacen->id_almacen=$id;
      $almacen->nombre=$datos->input('nombre');
      $almacen->direccion=$datos->input('direccion');
      $almacen->capacidad=(double)$datos->input('capacidad');
      $almacen->save();
      return Redirect('/consultarAlmacen');

    }

    public function eliminarAlmacen($id)
    {
      DB::table('Almacen')->where('id_almacen', $id)->delete();

      return Redirect('/consultarAlmacen');
    }

    public function guardarAlmacen(Request $datos)
    {
      $productos = DB::table('Producto')
      ->orderBy('id_producto')
      ->get();

      $almacen= new Almacen();
      $almacen->nombre=$datos->input('nombre');
      $almacen->direccion=$datos->input('direccion');
      $almacen->capacidad=(double)$datos->input('capacidad');
      $almacen->save();

      foreach ($productos as $p) {
        $stock= new Stock();
        $stock->id_almacen=$almacen->id_almacen;
        $stock->id_producto=$p->id_producto;
        $stock->cantidad=0;
        $stock->save();
      }
       return Redirect('/registrarAlmacen');

    }
}
