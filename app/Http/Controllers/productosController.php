<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;
use App\Proveedor;
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
        ->orderBy('id_producto')
        ->get();

        return view('admin.consultarProducto', compact('productos'));
    }

    public function registrarProducto()
    {
        $categorias = DB::table('Categoria')
          ->select('id_categoria', 'nombre')
          ->get();

        $proveedores = DB::table('Proveedor')
          ->select('id_proveedor', 'nombre')
          ->get();

    	return view('admin.registrarProducto', compact('categorias','proveedores'));
    }

    public function modificarProducto($id)
    {
      $productos = DB::table('Producto AS a')
        ->join('Categoria AS b','b.id_categoria', '=', 'a.id_categoria')
        ->join('Proveedor AS c','c.id_proveedor', '=', 'a.id_proveedor')
        ->select('a.*', 'b.nombre AS nombre_categoria', 'c.nombre AS nombre_proveedor')
        ->where('a.id_producto', $id)
        ->get();

        $producto=$productos->first();

        $categorias = DB::table('Categoria')
          ->select('id_categoria', 'nombre')
          ->get();

        $proveedores = DB::table('Proveedor')
          ->select('id_proveedor', 'nombre')
          ->get();

      return view('admin.modificarProducto', compact('producto','categorias','proveedores'));
    }

    public function actualizarProducto(Request $datos, $id)
    {
      $productos = DB::table('Producto')
        ->where('id_producto', $id)
        ->get();
        
      $producto=Producto::find($id);

      $producto->id_producto=$datos->input('id');
      $producto->nombre=$datos->input('nombre');
      $producto->precio=$datos->input('precio');
      $producto->descripcion=$datos->input('descripcion');
      $producto->id_categoria=$datos->input('categoria');
      $producto->id_proveedor=$datos->input('proveedor');
      $producto->save();

      return Redirect('/consultarProducto');

    }

    public function eliminarProducto($id)
    {
      DB::table('Producto')->where('id_producto', $id)->delete();

      return Redirect('/consultarProducto');
    }

    public function guardarProducto(Request $datos)
    {
       $producto = new Producto();
       $producto->id_producto=$datos->input('id');
       $producto->nombre=$datos->input('nombre');
       $producto->precio=$datos->input('precio');
       $producto->descripcion=$datos->input('descripcion');
       $producto->id_categoria=$datos->input('categoria');
       $producto->id_proveedor=$datos->input('proveedor');
       $producto->save();
       return Redirect('/registrarProducto');
    }
}
