<?php

namespace App\Http\Controllers;
use App\Categoria;
use DB;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    public function consultarCategoria() 
    {
    	$categorias = DB::table('Categoria')
      ->orderBy('id_categoria')
      ->get();

      return view('admin.consultarCategoria', compact('categorias'));
    }

    public function registrarCategoria()
    {
    	return view('admin.registrarCategoria');
    }

    public function modificarCategoria($id)
    {
      $categoria=Categoria::find($id);
      return view('admin.modificarCategoria', compact('categoria'));
    }

    public function actualizarCategoria(Request $datos, $id)
    {
      $categoria=Categoria::find($id);
      $categoria->id_categoria=$id;
      $categoria->nombre=$datos->input('nombre');
      $categoria->descripcion=$datos->input('descripcion');
      $categoria->save();
      return Redirect('/consultarCategoria');

    }

    public function eliminarCategoria($id)
    {
      DB::table('Categoria')->where('id_categoria', $id)->delete();

      return Redirect('/consultarCategoria');
    }

    public function guardarCategoria(Request $datos)
    {
      $categoria= new Categoria();
      $categoria->nombre=$datos->input('nombre');
      $categoria->descripcion=$datos->input('descripcion');
      $categoria->save();
       return Redirect('/registrarCategoria');
    }
}
