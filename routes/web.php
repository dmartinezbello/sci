<?php

/*Rutas Iniciales*/

Route::get('/', function () {
    return view('layouts.principal');
});

Route::get('/login', function () {
    return view('home');
});

/* Rutas de Empleados*/

Route::get('/admin', 'empleadosController@showLogin');->middleware('auth');

Route::get('/logout', 'empleadosController@logout');->middleware('auth');

Route::get('/iniciarSesion', 'empleadosController@iniciarSesion');

Route::post('/entrarSistema', 'empleadosController@postLogin');

Route::get('/registrarse', 'empleadosController@registrarEmpleado');

Route::post('/guardarEmpleado', 'empleadosController@guardarEmpleado');

/*Rutas de Contacto*/

Route::get('/contacto', 'contactosController@contacto');

Route::post('/enviarMensaje', 'contactosController@enviarMensaje');

/*Rutas de Productos*/

Route::get('/consultarProducto', 'productosController@consultarProducto')->middleware('auth');

Route::get('/registrarProducto', 'productosController@registrarProducto');->middleware('auth');

Route::get('/modificarProducto/{id}', 'productosController@modificarProducto');->middleware('auth');

Route::post('/eliminarProducto/{id}', 'productosController@eliminarProducto');->middleware('auth');

Route::post('/actualizarProducto/{id}', 'productosController@actualizarProducto');->middleware('auth');

Route::post('/guardarProducto', 'productosController@guardarProducto');->middleware('auth');

/*Rutas de Proveedores*/

Route::get('/registrarProveedor', 'proveedoresController@registrarProveedor');->middleware('auth');

Route::get('/consultarProveedor', 'proveedoresController@consultarProveedor');->middleware('auth');

Route::get('/modificarProveedor/{id}', 'proveedoresController@modificarProveedor');->middleware('auth');

Route::post('/guardarProveedor', 'proveedoresController@guardarProveedor');->middleware('auth');

Route::post('/eliminarProveedor/{id}', 'proveedoresController@eliminarProveedor');->middleware('auth');

Route::post('/actualizarProveedor/{id}', 'proveedoresController@actualizarProveedor');->middleware('auth');

/*Rutas de Categorias*/

Route::get('/registrarCategoria', 'categoriasController@registrarCategoria');->middleware('auth');

Route::get('/consultarCategoria', 'categoriasController@consultarCategoria');->middleware('auth');

Route::get('/modificarCategoria/{id}', 'categoriasController@modificarCategoria');->middleware('auth');

Route::post('/guardarCategoria', 'categoriasController@guardarCategoria');->middleware('auth');

Route::post('/eliminarCategoria/{id}', 'categoriasController@eliminarCategoria');->middleware('auth');

Route::post('/actualizarCategoria/{id}', 'categoriasController@actualizarCategoria');->middleware('auth');

/*Rutas de Almacenes*/

Route::get('/registrarAlmacen', 'almacenesController@registrarAlmacen');->middleware('auth');

Route::get('/consultarAlmacen', 'almacenesController@consultarAlmacen');->middleware('auth');

Route::get('/modificarAlmacen/{id}', 'almacenesController@modificarAlmacen');->middleware('auth');

Route::post('/guardarAlmacen', 'almacenesController@guardarAlmacen');->middleware('auth');

Route::post('/eliminarAlmacen/{id}', 'almacenesController@eliminarAlmacen');->middleware('auth');

Route::post('/actualizarAlmacen/{id}', 'almacenesController@actualizarAlmacen');->middleware('auth');

/*Rutas de Entradas*/

Route::get('/registrarEntrada', 'entradasController@registrarEntrada');->middleware('auth');

Route::get('/obtenerEntrada', 'entradasController@obtenerEntrada');->middleware('auth');

Route::get('/detalleEntrada/{id}', 'entradasController@detalleEntrada');->middleware('auth');

Route::post('/guardarEntrada', 'entradasController@guardarEntrada');->middleware('auth');

/*Rutas de Salidas*/

Route::get('/registrarSalida', 'salidasController@registrarSalida');->middleware('auth');

Route::get('/obtenerSalida', 'salidasController@obtenerSalida');->middleware('auth');

Route::get('/detalleSalida/{id}', 'salidasController@detalleSalida');->middleware('auth');

Route::post('/guardarSalida', 'salidasController@guardarSalida');->middleware('auth');