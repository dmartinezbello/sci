<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactosController extends Controller
{
    public function contacto()
    {
    	return view('contacto');
    }

    //Enviar mensajes de clientes al administrador.
    public function enviarMensaje(Request $datos)
    {
    	Redirect('/');
    }
}
