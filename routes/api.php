<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});

//CUANDO ES UN MIDDLEWARE DE VERIFICA.IDENTIDAD= A SER USUARIO TIPO ADMIN
//CUANDO ES UN MIDDLEWARE DE VERIFICA.IDENTIDAD2= A SER USUARIO TIPO USER
//CUANDO ES UN MIDDLEWARE DE VERIFICA.EDAD= A TENER RESTRICCION DE EDAD

/////////Solo vistas de las tablas
Route::get('mostrarComent/{id?}',['middleware'=>'verifica.edad','ComentsController@vista']);
Route::get('mostrarProduct/{id?}','ProductsController@vista')->middleware('verica.edad');
Route::get('mostrarUsuario/{id?}','UsuariosController@vista')->middleware('verica.identidad');
Route::post('mostrarUser','UserController@vista')->middleware('verica.identidad');
Route::post('mostrarUser2','UserController@vista')->middleware('verica.identidad2');

////////////introducir más informcaión
Route::post('insertComent','ComentsController@insertar')->middleware('verica.identidad');
Route::post('insertComent2','ComentsController@insertar')->middleware('verica.identidad2');
Route::post('insertProduct','ProductsController@insertar')->middleware('verica.identidad');
Route::post('insertUsuario','UsuariosController@insertar')->middleware('verica.identidad');

////////Relaciones entre tablas
Route::get('ComentProducts2','ComentsController@relacionTablas')->middleware('verica.identidad2');
Route::get('ComentProducts','ComentsController@relacionTablas')->middleware('verica.identidad');
Route::get('ProductCost2','ProductsController@relacionPrecio')->middleware('verica.identidad2');
Route::get('ProductCost','ProductsController@relacionPrecio')->middleware('verica.identidad');
Route::get('UsuComen','UsuariosController@relacionUsuComen')->middleware('verica.identidad');

////////Eliminar registros
Route::delete('deleteComent','ComentsController@eliminar')->middleware('verica.identidad');
Route::delete('deleteComent','ComentsController@eliminar')->middleware('verica.identidad2');
Route::delete('deleteProduct','ProductsController@eliminar')->middleware('verica.identidad');
Route::delete('deleteUsuario','UsuariosController@eliminar')->middleware('verica.identidad');
/////////////////////////////

///////Actualizar tablas
Route::put('updateProduct/{id}','ProductsController@actualizar')->middleware('verica.identidad');
Route::put('updateComent/{id}','ComentsController@actualizar')->middleware('verica.identidad');
Route::put('updateUsuario2/{id}','UsuariosController@actualizar')->middleware('verica.identidad2');
Route::put('updateUsuario/{id}','UsuariosController@actualizar')->middleware('verica.identidad');
Route::put('actualizarIdentidad/{id}','UserController@actualizarIdentidad')->middleware('verica.identidad');
Route::put('actualizar/{id}','UserController@actualizarIdentidad')->middleware('verica.identidad');

///Mildeware tokens
Route::middleware('auth:sanctum')->get('index','UserController@index');
Route::middleware('auth:sanctum')->delete('cerrarSesion','UserController@cerrarSesion');

//Rutas
Route::post('inicioSesion','UserController@inicio');
Route::post('registrar','UserController@insertar');


//get--http://127.0.0.1:8000/api/mostrarProduct
//get--http://127.0.0.1:8000/api/mostrarComent
//get--http://127.0.0.1:8000/api/mostrarUsuario

//post--http://127.0.0.1:8000/api/insertComent
//post--http://127.0.0.1:8000/api/insertProduct
//post--http://127.0.0.1:8000/api/insertUsuario

//get--http://127.0.0.1:8000/api/ComentProducts
//get--http://127.0.0.1:8000/api/ProductCost
//get--http://127.0.0.1:8000/api/UsuComen

//delete--http://127.0.0.1:8000/api/deleteComent
//delete--http://127.0.0.1:8000/api/deleteProduct
//delete--http://127.0.0.1:8000/api/deleteUsuario

//put---http://127.0.0.1:8000/api/updateProduct/id
//put---http://127.0.0.1:8000/api/updateComent/id
//put---http://127.0.0.1:8000/api/updateUsuario/id
//put---http://127.0.0.1:8000/api/actualizar/id
//put---http://127.0.0.1:8000/api/actualizarIdentidad/id

//post---http://127.0.0.1:8000/api/registrar
//post---http://127.0.0.1:8000/api/inicioSesion
//get--http://127.0.0.1:8000/api/index
//delete--http://127.0.0.1:8000/api/cerrarSesion
