<?php

namespace App\Http\Controllers;
use App\Empleado;
use DB; //Query Builder. 
use Illuminate\Http\Request;
use Auth;

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

    public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View('iniciarsesion');
    }

    /**
     * Valida los datos del usuario.
     */
    public function postLogin(Request $datos)
    {
        // Guardamos en un arreglo los datos del usuario.

        $username=$datos->input('usuario');
        $password=$datos->input('contrasena');
        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        /*$user=Empleado::where('usuario',$username) -> first();
        if($user==null)
        {
            return Redirect('/iniciarSesion')
                ->with('mensaje_error', 'Usuario no encontrado')
                   ->withInput();
        }

        if($user->password==$password)
        {
            Auth::login($user);
            return Redirect('/iniciarSesion')
                ->with('mensaje_error', 'Sesion iniciada correctamente')
                   ->withInput();
        }

            return Redirect('/iniciarSesion')
                ->with('mensaje_error', 'Contrasena incorrecta')
                   ->withInput();

        */
        if(Auth::attempt(array('usuario' => $username, 'password' => $password)))
        {
            // De ser datos válidos nos mandara a la bienvenida
             return Redirect('/login')/*
                    ->with('mensaje_error', Auth::user()->nombre)
                    ->withInput()*/;
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect('/iniciarSesion')
                    ->with('mensaje_error', 'Tus datos son incorrectos')
                    ->withInput();
    }
}
