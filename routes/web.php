<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController@index')->name('hola');
        //grupo de rutas para el admin
Route ::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    //rutas del rol
    Route::get('rol', 'RolController@index') ->name('rol');
    Route::get('rol/crear', 'RolController@create') ->name('crear_rol');
    Route::get('rol/{id}/editar', 'RolController@edit') ->name('editar_rol');
    Route::post('rol', 'RolController@store') ->name('guardar_rol');
    Route::put('rol/{id}', 'RolController@update') ->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol');
});
