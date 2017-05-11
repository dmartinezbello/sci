<?php

Route::get('/', function () {
    return view('layouts.principal');
});

/*Rutas de Empleados*/
Route::get('/iniciarSesion', 'empleadosController@showLogin');
Route::post('/entrarSistema', 'empleadosController@postLogin');
Route::get('/registrar', 'empleadosController@registrarEmpleado');
Route::post('/guardarEmpleado', 'empleadosController@guardarEmpleado');

/*Rutas de Contactos*/
Route::get('/contacto', 'contactosController@contacto');
Route::post('/enviarMensaje', 'contactosController@enviarMensaje');

/*Ruta de Login*/
Route::get('/login', function () {
    return view('home');
});
