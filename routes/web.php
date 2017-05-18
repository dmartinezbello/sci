<?php

/*Rutas Iniciales*/

Route::get('/', function () {
    return view('layouts.principal');
});

Route::get('/login', function () {
    return view('home');
});

/* Rutas de Empleados*/

Route::get('/admin', 'empleadosController@showLogin');

Route::get('/logout', 'empleadosController@logout');

Route::get('/iniciarSesion', 'empleadosController@iniciarSesion');

Route::post('/entrarSistema', 'empleadosController@postLogin');

Route::get('/registrarse', 'empleadosController@registrarEmpleado');

Route::post('/guardarEmpleado', 'empleadosController@guardarEmpleado');

/*Rutas de Contacto*/

Route::get('/contacto', 'contactosController@contacto');

Route::post('/enviarMensaje', 'contactosController@enviarMensaje');

/*Rutas de Productos*/

Route::get('/consultarProducto', 'productosController@consultarProducto');

Route::get('/registrarProducto', 'productosController@registrarProducto');

Route::get('/modificarProducto/{id}', 'productosController@modificarProducto');

Route::post('/eliminarProducto/{id}', 'productosController@eliminarProducto');

Route::post('/actualizarProducto/{id}', 'productosController@actualizarProducto');

Route::post('/guardarProducto', 'productosController@guardarProducto');
