<?php

Route::get('/', function () {
    return view('layouts.principal');
});
<<<<<<< HEAD

Route::get('/admin', function () {
    return view('layouts.admin');
});

=======
/*Rutas de Empleados*/
>>>>>>> 919dc49fc68ee980757e15d30548286a5a953139
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
