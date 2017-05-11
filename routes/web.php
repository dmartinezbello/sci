<?php

Route::get('/', function () {
    return view('layouts.principal');
});

/*Rutas de Empleados*/
Route::get('/iniciarSesion', 'empleadosController@iniciarSesion');
Route::post('/entrarSistema', 'empleadosController@entrarSistema');

/*Rutas de Contactos*/
Route::get('/contacto', 'contactosController@contacto');
Route::post('/enviarMensaje', 'contactosController@enviarMensaje');

/*Recurso Producto*/
Route::resource('producto', 'productosController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
