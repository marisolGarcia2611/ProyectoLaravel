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

/////////Solo vistas de las tablas
Route::get('mostrarComent/{id?}','ComentsController@vista');
Route::get('mostrarProduct/{id?}','ProductsController@vista');
Route::get('mostrarUsuario/{id?}','UsuariosController@vista');

////////////introducir más informcaión
Route::post('insertComent','ComentsController@insertar');
Route::post('insertProduct','ProductsController@insertar');
Route::post('insertUsuario','UsuariosController@insertar');

////////Relaciones entre tablas
Route::get('ComentProducts','ComentsController@relacionTablas');
Route::get('ProductCost','ProductsController@relacionPrecio');
Route::get('UsuComen','UsuariosController@relacionUsuComen');



////////Eliminar registros
Route::delete('deleteComent','ComentsController@eliminar');
Route::delete('deleteProduct','ProductsController@eliminar');
Route::delete('deleteUsuario','UsuariosController@eliminar');
/////////////////////////////

///////Actualizar tabla productos
Route::put('updateProduct/{id}','ProductsController@actualizar');
Route::put('updateComent/{id}','ComentsController@actualizar');
Route::put('updateUsuario/{id}','UsuariosController@actualizar');

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
