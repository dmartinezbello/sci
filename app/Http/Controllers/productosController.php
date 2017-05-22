<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Categoria;
use App\Proveedor;
use App\Stock;
use App\Almacen;
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
        ->where('Producto.estado', 1)
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
      $producto = DB::table('Producto AS a')
        ->join('Categoria AS b','b.id_categoria', '=', 'a.id_categoria')
        ->join('Proveedor AS c','c.id_proveedor', '=', 'a.id_proveedor')
        ->select('a.*', 'b.nombre AS nombre_categoria', 'c.nombre AS nombre_proveedor')
        ->where('a.id_producto', $id)
        ->first();

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
      $producto=Producto::find($id);
      $producto->id_producto=$id;
      $producto->nombre=$datos->input('nombre');
      $producto->precio=(double)$datos->input('precio');
      $producto->descripcion=$datos->input('descripcion');
      $producto->id_categoria=$datos->input('categoria');
      $producto->id_proveedor=$datos->input('proveedor');
      $producto->save();

      return Redirect('/consultarProducto');

    }

    public function eliminarProducto($id)
    {
      //DB::table('Producto')->where('id_producto', $id)->delete();
      $producto=Producto::find($id);
      $producto->estado=0;
      $producto->save();
      return Redirect('/consultarProducto');
    }

    public function guardarProducto(Request $datos)
    {
      
      //Obtenemos todos los almacenes registrados.
      $almacenes = DB::Table('Almacen')
      ->select('id_almacen')
      ->get();
      //->all(); //El all convierte la coleccion en un array.

      //dd($almacenes);

      //Guardamos el nuevo producto.
      $producto = new Producto();
      $producto->id_producto=$datos->input('id');
      $producto->nombre=$datos->input('nombre');
      $producto->precio=(double)$datos->input('precio');
      $producto->descripcion=$datos->input('descripcion');
      $producto->id_categoria=$datos->input('categoria');
      $producto->id_proveedor=$datos->input('proveedor');
      $producto->estado=1;
      $producto->save();

      //dd($datos->input('id'));

      //Cantidad de almacenes encontrados.
      //$longitud = count($almacenes);
      
      //dd($longitud);

      //Recorremos el arreglo de almacenes.
      //for ($i=0; $i <$longitud; $i++) 
      foreach ($almacenes as $a)
      {
        //Damos de alta el producto en todos los almacenes con Stock = 0.
        $stock = new Stock();
        $stock->id_almacen = $a->id_almacen;
        $stock->id_producto = $datos->input('id');
        $stock->cantidad=0;
        $stock->save();
      }

      return Redirect('/registrarProducto');
    }
}
