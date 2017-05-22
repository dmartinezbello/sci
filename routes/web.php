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

Route::get('/consultarProducto', 'productosController@consultarProducto')->middleware('admin','productos');

Route::get('/registrarProducto', 'productosController@registrarProducto')->middleware('admin','productos');

Route::get('/modificarProducto/{id}', 'productosController@modificarProducto')->middleware('admin','productos');

Route::post('/eliminarProducto/{id}', 'productosController@eliminarProducto')->middleware('admin','productos');

Route::post('/actualizarProducto/{id}', 'productosController@actualizarProducto')->middleware('admin','productos');

Route::post('/guardarProducto', 'productosController@guardarProducto')->middleware('admin');


/*Rutas de Categorias*/

Route::get('/registrarCategoria', 'categoriasController@registrarCategoria')->middleware('admin','productos');

Route::get('/consultarCategoria', 'categoriasController@consultarCategoria')->middleware('admin','productos');

Route::get('/modificarCategoria/{id}', 'categoriasController@modificarCategoria')->middleware('admin','productos');

Route::post('/guardarCategoria', 'categoriasController@guardarCategoria')->middleware('admin','productos');

Route::post('/eliminarCategoria/{id}', 'categoriasController@eliminarCategoria')->middleware('admin','productos');

Route::post('/actualizarCategoria/{id}', 'categoriasController@actualizarCategoria')->middleware('admin','productos');

/*Rutas de Almacenes*/

Route::get('/registrarAlmacen', 'almacenesController@registrarAlmacen')->middleware('admin','almacenes');

Route::get('/consultarAlmacen', 'almacenesController@consultarAlmacen')->middleware('admin','almacenes');

Route::get('/modificarAlmacen/{id}', 'almacenesController@modificarAlmacen')->middleware('admin','almacenes');

Route::get('/detalleAlmacen/{id}', 'almacenesController@detalleAlmacen')->middleware('admin','almacenes');

Route::post('/guardarAlmacen', 'almacenesController@guardarAlmacen')->middleware('admin','almacenes');

Route::post('/eliminarAlmacen/{id}', 'almacenesController@eliminarAlmacen')->middleware('admin','almacenes');

Route::post('/actualizarAlmacen/{id}', 'almacenesController@actualizarAlmacen')->middleware('admin','almacenes');

/*Rutas de Proveedores*/

Route::get('/registrarProveedor', 'proveedoresController@registrarProveedor')->middleware('admin','almacenes');

Route::get('/consultarProveedor', 'proveedoresController@consultarProveedor')->middleware('admin','almacenes');

Route::get('/modificarProveedor/{id}', 'proveedoresController@modificarProveedor')->middleware('admin','almacenes');

Route::post('/guardarProveedor', 'proveedoresController@guardarProveedor')->middleware('admin','almacenes');

Route::post('/eliminarProveedor/{id}', 'proveedoresController@eliminarProveedor')->middleware('admin','almacenes');

Route::post('/actualizarProveedor/{id}', 'proveedoresController@actualizarProveedor')->middleware('admin','almacenes');

/*Rutas de Entradas*/

Route::get('/registrarEntrada', 'entradasController@registrarEntrada')->middleware('admin','entradas');

Route::get('/consultarEntrada', 'entradasController@consultarEntrada')->middleware('admin','entradas');

Route::get('/obtenerEntrada', 'entradasController@obtenerEntrada')->middleware('admin','entradas');

Route::get('/detalleEntrada/{id}', 'entradasController@detalleEntrada')->middleware('admin','entradas');

Route::post('/guardarEntrada', 'entradasController@guardarEntrada')->middleware('admin','entradas');

/*Rutas de Salidas*/

Route::get('/registrarSalida', 'salidasController@registrarSalida')->middleware('admin','salidas');

Route::get('/consultarSalida', 'salidasController@consultarSalida')->middleware('admin','salidas');

Route::get('/obtenerSalida', 'salidasController@obtenerSalida')->middleware('admin','salidas');

Route::get('/detalleSalida/{id}', 'salidasController@detalleSalida')->middleware('admin','salidas');

Route::post('/guardarSalida', 'salidasController@guardarSalida')->middleware('admin','salidas');