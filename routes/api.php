<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('get_usuarios', 'App\Http\Controllers\UsuariosController@get_usuarios');
    Route::post('store', 'App\Http\Controllers\UsuariosController@store');
    Route::put('update/{id_usuario}', 'App\Http\Controllers\UsuariosController@update');
    Route::delete('delete/{id_usuario}', 'App\Http\Controllers\UsuariosController@delete');
});
