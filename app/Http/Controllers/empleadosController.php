<?php

namespace App\Http\Controllers;
use App\Empleado;
use DB;
use Illuminate\Http\Request;
use Auth;

class empleadosController extends Controller
{
    public function iniciarSesion()
    {
    	return view('iniciarsesion');
    }

    public function registrarEmpleado(){
    	return view('registrarse');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect('/');
    }

    public function guardarEmpleado(Request $datos){
       $empleado= new Empleado();
       $empleado->usuario=$datos->input('usuario');
       $empleado->password=bcrypt($datos->input('contrasena'));
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
        if(Auth::attempt(array('usuario' => $username, 'password' => $password)))
        {
            // De ser datos válidos nos mandara a la bienvenida
           return Redirect('/iniciarSesion');
       }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
       return Redirect('/iniciarSesion')
       ->with('mensaje_error', 'Tus datos son incorrectos')
       ->withInput();
   }




}
