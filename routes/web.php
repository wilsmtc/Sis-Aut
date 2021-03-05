<?php

use Illuminate\Support\Facades\Route;

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
        //grupo de rutas para el admin
Route ::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware'=> 'auth'], function(){
    Route::get('/', 'InicioController@index')->name('inicio');
    //rutas del rol
    Route::get('rol', 'RolController@index') ->name('rol');
    Route::get('rol/crear', 'RolController@create') ->name('crear_rol')->middleware('permisocrear');
    Route::get('rol/{id}/editar', 'RolController@edit') ->name('editar_rol')->middleware('permisoeditar');
    Route::post('rol', 'RolController@store') ->name('guardar_rol');
    Route::put('rol/{id}', 'RolController@update') ->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol')->middleware('permisoeliminar');
    //rutas de Usuarios
    Route::get('usuario', 'UsuarioController@index') ->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@create') ->name('crear_usuario')->middleware('permisocrear');
    Route::get('usuario/{id}/editar', 'UsuarioController@edit') ->name('editar_usuario')->middleware('permisoeditar');
    Route::post('usuario', 'UsuarioController@store') ->name('guardar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@update') ->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@destroy')->name('eliminar_usuario')->middleware('permisoeliminar');
    Route::post('usuario/{usuario}', 'UsuarioController@ver')->name('ver_usuario');
    Route::get('usuario_inactivo', 'UsuarioController@index_inactivo') ->name('usuario_inactivo');
    Route::put('usuario/{id}/inactivar', 'UsuarioController@inactivar') ->name('inactivar_usuario')->middleware('permisoeditar');
    Route::put('usuario/{id}/activar', 'UsuarioController@activar') ->name('activar_usuario')->middleware('permisoeditar');
    //rutas del menu
    Route::get('menu', 'MenuController@index') ->name('menu');
    Route::get('menu/crear', 'MenuController@create') ->name('crear_menu')->middleware('permisocrear');
    Route::get('menu/{id}/editar', 'MenuController@edit') ->name('editar_menu')->middleware('permisoeditar');
    Route::post('menu', 'MenuController@store') ->name('guardar_menu');
    Route::put('menu/{id}', 'MenuController@update') ->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@destroy') ->name('eliminar_menu')->middleware('permisoeliminar');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar-orden');
    //rutas del menu-rol
    Route::get('menu-rol', 'MenuRolController@index') ->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@store') ->name('guardar_menu_rol');
});
