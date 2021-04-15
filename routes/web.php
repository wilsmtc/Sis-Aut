<?php

use Illuminate\Support\Facades\Route;

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
        //grupo de rutas para el admin
Route ::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware'=> 'auth'], function(){
    Route::get('/', 'InicioController@index')->name('inicio');
    Route ::group(['middleware'=> 'permisoadmin'], function(){
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
            Route::put('usuario/{id}/inactivar', 'UsuarioController@inactivar') ->name('inactivar_usuario')->middleware('permisoeliminar');
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
            //rutas de clinica
            Route::get('clinica', 'ClinicaController@index') ->name('clinica');
            Route::get('clinica/{id}/editar', 'ClinicaController@edit') ->name('editar_clinica')->middleware('permisoeditar');
            Route::put('clinica/{id}', 'ClinicaController@update') ->name('actualizar_clinica');
    });
    //rutas de unidad
    Route::get('unidad', 'UnidadController@index') ->name('unidad');
    Route::get('unidad/crear', 'UnidadController@create') ->name('crear_unidad')->middleware('permisocrear');
    Route::get('unidad/{id}/editar', 'UnidadController@edit') ->name('editar_unidad')->middleware('permisoeditar');
    Route::post('unidad', 'UnidadController@store') ->name('guardar_unidad');
    Route::put('unidad/{id}', 'UnidadController@update') ->name('actualizar_unidad');
    Route::delete('unidad/{id}/eliminar', 'UnidadController@destroy')->name('eliminar_unidad')->middleware('permisoeliminar');
        //rutas de personal
    Route::get('personal', 'PersonalController@index') ->name('personal');
    Route::get('personal/crear', 'PersonalController@create') ->name('crear_personal')->middleware('permisocrear');
    Route::get('personal/{id}/editar', 'PersonalController@edit') ->name('editar_personal')->middleware('permisoeditar');
    Route::post('personal', 'PersonalController@store') ->name('guardar_personal');
    Route::put('personal/{id}', 'PersonalController@update') ->name('actualizar_personal');
    Route::delete('personal/{id}', 'PersonalController@destroy')->name('eliminar_personal')->middleware('permisoeliminar');
    Route::get('personal/{id}/curriculum', 'PersonalController@pdf')->name('ver_curriculum');
    Route::post('personal/{personal}', 'PersonalController@ver')->name('ver_personal');
    Route::get('personal_inactivo', 'PersonalController@index_inactivo') ->name('personal_inactivo');
    Route::put('personal/{id}/inactivar', 'PersonalController@inactivar') ->name('inactivar_personal')->middleware('permisoeliminar');
    Route::put('personal/{id}/activar', 'PersonalController@activar') ->name('activar_personal')->middleware('permisoeditar');

        // Rutas del paciente
    Route::get('paciente', 'PacienteController@index') ->name('paciente');
    Route::get('paciente/crear', 'PacienteController@create') ->name('crear_paciente')->middleware('permisocrear');
    Route::get('paciente/{id}/editar', 'PacienteController@edit') ->name('editar_paciente')->middleware('permisoeditar');
    Route::post('pacient', 'PacienteController@store') ->name('guardar_paciente');
    Route::put('paciente/{id}', 'PacienteController@update') ->name('actualizar_paciente');
    Route::delete('paciente/{id}', 'PacienteController@destroy')->name('eliminar_paciente')->middleware('permisoeliminar');
    Route::get('paciente/{id}/ver', 'PacienteController@ver') ->name('ver_paciente');  
    Route::post('paciente', 'PacienteController@ordenar') ->name('ordenar_paciente');
    //rutas de cargo
    Route::get('cargo', 'CargoController@index') ->name('cargo');
    Route::get('cargo/crear', 'CargoController@create') ->name('crear_cargo')->middleware('permisocrear');
    Route::get('cargo/{id}/editar', 'CargoController@edit') ->name('editar_cargo')->middleware('permisoeditar');
    Route::post('cargo', 'CargoController@store') ->name('guardar_cargo');
    Route::put('cargo/{id}', 'CargoController@update') ->name('actualizar_cargo');
    Route::delete('unidad/{id}', 'CargoController@destroy')->name('eliminar_cargo')->middleware('permisoeliminar');
    //rutas de servicio
    Route::get('servicio', 'ServicioController@index') ->name('servicio');
    Route::get('servicio/crear', 'ServicioController@create') ->name('crear_servicio')->middleware('permisocrear');
    Route::get('servicio/{id}/editar', 'ServicioController@edit') ->name('editar_servicio')->middleware('permisoeditar');
    Route::post('servicio', 'ServicioController@store') ->name('guardar_servicio');
    Route::put('servicio/{id}', 'ServicioController@update') ->name('actualizar_servicio');
    Route::delete('servicio/{id}', 'ServicioController@destroy')->name('eliminar_servicio')->middleware('permisoeliminar');
        //Rutas de Ficha
    Route::get('ficha', 'FichaController@index') ->name('ficha');
    Route::get('ficha/{id}/crear', 'FichaController@create') ->name('crear_ficha')->middleware('permisocrear');
    Route::post('ficha', 'FichaController@store') ->name('guardar_ficha');
    Route::put('ficha/{id}', 'FichaController@update') ->name('actualizar_ficha');
    Route::delete('ficha/{id}/eliminar', 'FichaController@destroy')->name('eliminar_ficha')->middleware('permisoeliminar');
});
