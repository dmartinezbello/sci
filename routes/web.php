<?php

Route::get('/', function () {
    return view('layouts.principal');
});
/*Rutas de Empleados*/
Route::get('/iniciarSesion', 'empleadosController@iniciarSesion');
Route::post('/entrarSistema', 'empleadosController@postLogin');
Route::get('/registrarse', 'empleadosController@registrarEmpleado');
Route::post('/guardarEmpleado', 'empleadosController@guardarEmpleado');

Route::get('/contacto', 'contactosController@contacto');
Route::post('/enviarMensaje', 'contactosController@enviarMensaje');


/*Ruta de Login*/
Route::get('/login', function () {
    return view('home');
});
Route::get('/logout', 'empleadosController@logout');

Route::resource('producto', 'productosController');
