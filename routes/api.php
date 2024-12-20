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

Route::group([
    'prefix' => 'departamentos'
], function () {
    Route::get('get_all_departamentos', 'App\Http\Controllers\DepartamentosController@get_all_departamentos');
});

Route::group([
    'prefix' => 'cargos'
], function () {
    Route::get('get_all_cargos', 'App\Http\Controllers\CargosController@get_all_cargos');
});


Route::group([
    'prefix' => 'usuarios'
], function () {
    Route::get('get_usuarios/{id_departamento}/{id_cargo}/{page}/{perPage}', 'App\Http\Controllers\UsuariosController@get_usuarios');
    Route::post('store', 'App\Http\Controllers\UsuariosController@store');
    Route::put('update/{id_usuario}', 'App\Http\Controllers\UsuariosController@update');
    Route::delete('delete/{id_usuario}', 'App\Http\Controllers\UsuariosController@delete');
});
