<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class empleadosController extends Controller
{
    public function iniciarSesion()
    {
    	return view('iniciarsesion');
    }

    public function registrarEmpleado(){
    	return view('registrar');
    }

    //Autenticar empleado en el sistema.
    public function entrarSistema(Request $datos)
    {
    	Redirect('/');
    }


	public function guardarEmpleado(Request $datos){
	    $empleado= new Empleado();
	    $empleado->usuario=$datos->input('usuario');
	    $empleado->contrasena=$datos->input('contrasena');
	    $empleado->nombre=$datos->input('nombre');
	    $empleado->apellido=$datos->input('apellido');
	    $empleado->save();
	    return Redirect('/');
	}

}
