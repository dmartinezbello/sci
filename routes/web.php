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

/*Rutas de Proveedores*/

Route::get('/registrarProveedor', 'proveedoresController@registrarProveedor');

Route::get('/consultarProveedor', 'proveedoresController@consultarProveedor');

Route::get('/modificarProveedor/{id}', 'proveedoresController@modificarProveedor');

Route::post('/guardarProveedor', 'proveedoresController@guardarProveedor');

Route::post('/eliminarProveedor/{id}', 'proveedoresController@eliminarProveedor');

Route::post('/actualizarProveedor/{id}', 'proveedoresController@actualizarProveedor');

/*Rutas de Categorias*/
Route::get('/registrarCategoria', 'categoriasController@registrarCategoria');

Route::get('/consultarCategoria', 'categoriasController@consultarCategoria');

Route::get('/modificarCategoria/{id}', 'categoriasController@modificarCategoria');

Route::post('/guardarCategoria', 'categoriasController@guardarCategoria');

Route::post('/eliminarCategoria/{id}', 'categoriasController@eliminarCategoria');

Route::post('/actualizarCategoria/{id}', 'categoriasController@actualizarCategoria');

/*Rutas de Almacenes*/

Route::get('/registrarAlmacen', 'almacenesController@registrarAlmacen');

Route::get('/consultarAlmacen', 'almacenesController@consultarAlmacen');

Route::get('/modificarAlmacen/{id}', 'almacenesController@modificarAlmacen');

Route::post('/guardarAlmacen', 'almacenesController@guardarAlmacen');

Route::post('/eliminarAlmacen/{id}', 'almacenesController@eliminarAlmacen');

Route::post('/actualizarAlmacen/{id}', 'almacenesController@actualizarAlmacen');

/*Rutas de Entradas*/

Route::get('/registrarEntrada', 'entradasController@registrarEntrada');

Route::get('/obtenerEntrada/{id}', 'entradasController@obtenerEntrada');