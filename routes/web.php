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

Route::get('/consultarProducto', 'productosController@consultarProducto')->middleware('productos');

Route::get('/registrarProducto', 'productosController@registrarProducto')->middleware('productos');

Route::get('/modificarProducto/{id}', 'productosController@modificarProducto')->middleware('productos');

Route::post('/eliminarProducto/{id}', 'productosController@eliminarProducto')->middleware('productos');

Route::post('/actualizarProducto/{id}', 'productosController@actualizarProducto')->middleware('productos');

Route::post('/guardarProducto', 'productosController@guardarProducto')->middleware();


/*Rutas de Categorias*/

Route::get('/registrarCategoria', 'categoriasController@registrarCategoria')->middleware('productos');

Route::get('/consultarCategoria', 'categoriasController@consultarCategoria')->middleware('productos');

Route::get('/modificarCategoria/{id}', 'categoriasController@modificarCategoria')->middleware('productos');

Route::post('/guardarCategoria', 'categoriasController@guardarCategoria')->middleware('productos');

Route::post('/eliminarCategoria/{id}', 'categoriasController@eliminarCategoria')->middleware('productos');

Route::post('/actualizarCategoria/{id}', 'categoriasController@actualizarCategoria')->middleware('productos');

/*Rutas de Almacenes*/

Route::get('/registrarAlmacen', 'almacenesController@registrarAlmacen')->middleware('almacenes');

Route::get('/consultarAlmacen', 'almacenesController@consultarAlmacen')->middleware('almacenes');

Route::get('/modificarAlmacen/{id}', 'almacenesController@modificarAlmacen')->middleware('almacenes');

Route::get('/detalleAlmacen/{id}', 'almacenesController@detalleAlmacen')->middleware('almacenes');

Route::post('/guardarAlmacen', 'almacenesController@guardarAlmacen')->middleware('almacenes');

Route::post('/eliminarAlmacen/{id}', 'almacenesController@eliminarAlmacen')->middleware('almacenes');

Route::post('/actualizarAlmacen/{id}', 'almacenesController@actualizarAlmacen')->middleware('almacenes');

/*Rutas de Proveedores*/

Route::get('/registrarProveedor', 'proveedoresController@registrarProveedor')->middleware('almacenes');

Route::get('/consultarProveedor', 'proveedoresController@consultarProveedor')->middleware('almacenes');

Route::get('/modificarProveedor/{id}', 'proveedoresController@modificarProveedor')->middleware('almacenes');

Route::post('/guardarProveedor', 'proveedoresController@guardarProveedor')->middleware('almacenes');

Route::post('/eliminarProveedor/{id}', 'proveedoresController@eliminarProveedor')->middleware('almacenes');

Route::post('/actualizarProveedor/{id}', 'proveedoresController@actualizarProveedor')->middleware('almacenes');

/*Rutas de Entradas*/

Route::get('/registrarEntrada', 'entradasController@registrarEntrada')->middleware('entradas');

Route::get('/consultarEntrada', 'entradasController@consultarEntrada')->middleware('entradas');

Route::get('/obtenerEntrada', 'entradasController@obtenerEntrada')->middleware('entradas');

Route::get('/detalleEntrada/{id}', 'entradasController@detalleEntrada')->middleware('entradas');

Route::post('/guardarEntrada', 'entradasController@guardarEntrada')->middleware('entradas');

/*Rutas de Salidas*/

Route::get('/registrarSalida', 'salidasController@registrarSalida')->middleware('salidas');

Route::get('/consultarSalida', 'salidasController@consultarSalida')->middleware('salidas');

Route::get('/obtenerSalida', 'salidasController@obtenerSalida')->middleware('salidas');

Route::get('/detalleSalida/{id}', 'salidasController@detalleSalida')->middleware('salidas');

Route::post('/guardarSalida', 'salidasController@guardarSalida')->middleware('salidas');