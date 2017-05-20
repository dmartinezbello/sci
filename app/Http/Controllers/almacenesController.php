<?php

namespace App\Http\Controllers;
use App\Almacen;
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
      $almacen->capacidad=$datos->input('capacidad');
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
      $almacen= new Almacen();
      $almacen->nombre=$datos->input('nombre');
      $almacen->direccion=$datos->input('direccion');
      $almacen->capacidad=$datos->input('capacidad');
      $almacen->save();
       return Redirect('/registrarAlmacen');
    }
}
