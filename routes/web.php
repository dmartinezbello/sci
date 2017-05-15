<?php

Route::get('/', function () {
    return view('layouts.principal');
});

/*
Route::get('/admin', function () {
    return view('layouts.admin');
});
*/
Route::get('/admin', 'empleadosController@showLogin');

Route::get('/iniciarSesion', 'empleadosController@iniciarSesion');
Route::post('/entrarSistema', 'empleadosController@postLogin');
Route::get('/registrarse', 'empleadosController@registrarEmpleado');
Route::post('/guardarEmpleado', 'empleadosController@guardarEmpleado');

Route::get('/contacto', 'contactosController@contacto');
Route::post('/enviarMensaje', 'contactosController@enviarMensaje');

Route::get('/login', function () {
    return view('home');
});

Route::get('/logout', 'empleadosController@logout');

Route::get('/consultarProducto', 'productosController@consultarProducto');
Route::get('/registrarProducto', 'productosController@registrarProducto');
Route::get('/modificarProducto/{id}', 'productosController@modificarProducto');
Route::get('/eliminarProducto/{id}', 'productosController@eliminarProducto');
Route::post('/actualizarProducto/{id}', 'productosController@actualizarProducto');
Route::get('/guardarProducto', 'productosController@guardarProducto');
