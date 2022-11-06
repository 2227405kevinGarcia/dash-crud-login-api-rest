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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productos','App\Http\Controllers\ProductosController@index');
Route::post('/productos','App\Http\Controllers\ProductosController@store');
Route::put('/productos/{id}','App\Http\Controllers\ProductosController@update');
Route::delete('/productos/{id}','App\Http\Controllers\ProductosController@destroy');

Route::get('/categorias','App\Http\Controllers\CategoriasController@index');
Route::post('/categorias','App\Http\Controllers\CategoriasController@store');
Route::put('/categorias/{id}','App\Http\Controllers\CategoriasController@update');
Route::delete('/categorias/{id}','App\Http\Controllers\CategoriasController@destroy');