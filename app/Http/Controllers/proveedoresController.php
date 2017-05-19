<?php

namespace App\Http\Controllers;
use App\Proveedor;
use DB;
use Illuminate\Http\Request;

class proveedoresController extends Controller
{
    public function consultarProveedor() 
    {
    	$proveedores = DB::table('Proveedor')
      ->orderBy('id_proveedor')
      ->get();

      return view('admin.consultarProveedor', compact('proveedores'));
    }

    public function registrarProveedor()
    {
    	return view('admin.registrarProveedor');
    }

    public function modificarProveedor($id)
    {
      $proveedor=Proveedor::find($id);
      return view('admin.modificarProveedor', compact('proveedor'));
    }

    public function actualizarProveedor(Request $datos, $id)
    {
      $proveedor=Proveedor::find($id);
      $proveedor->id_proveedor=$id;
      $proveedor->nombre=$datos->input('nombre');
      $proveedor->email=$datos->input('email');
      $proveedor->direccion=$datos->input('direccion');
      $proveedor->telefono=$datos->input('telefono');
      $proveedor->save();
      return Redirect('/consultarProveedor');

    }

    public function eliminarProveedor($id)
    {
      DB::table('Proveedor')->where('id_proveedor', $id)->delete();

      return Redirect('/consultarProveedor');
    }

    public function guardarProveedor(Request $datos)
    {
      $proveedor= new Proveedor();
      $proveedor->nombre=$datos->input('nombre');
      $proveedor->email=$datos->input('email');
      $proveedor->direccion=$datos->input('direccion');
      $proveedor->telefono=$datos->input('telefono');
      $proveedor->save();
       return Redirect('/registrarProveedor');
    }
}
