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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/hora', 'HomeController@hora')->name('hora');

// ROUTES

// Envolvemos todas las rutas ya que se requiere utenticación
Route::middleware(['auth'])->group(function(){

    /*
    ->middleware('permission:roles.create');
        permission hace referencia a /app/Http/Kernel.php
        $routeMiddleware = [
        'permission' =>\Caffeinated\Shinobi\Middleware\UserHasPermission::class
        ]
    */



    // ROLES
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
            ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
            ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
            ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
            ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
            ->middleware('permission:roles.show');

    Route::post('roles/destroy', 'RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');

   // DUEÑOS


    Route::get('duenos', 'DuenoController@index')->name('duenos.index')
            ->middleware('permission:duenos.index');

    Route::get('duenos/listar', 'DuenoController@listar')->name('duenos.listar')
            ->middleware('permission:duenos.index');

    Route::put('duenos/{dueno}', 'DuenoController@update')->name('duenos.update')
            ->middleware('permission:duenos.edit');

    Route::get('duenos/{dueno}', 'DuenoController@show')->name('duenos.show')
            ->middleware('permission:duenos.show');


    Route::get('duenos/{dueno}/edit', 'DuenoController@edit')->name('duenos.edit')
            ->middleware('permission:duenos.edit');




    // VEHICULOS
    Route::post('vehiculos/store', 'VehiculoController@store')->name('vehiculos.store')
            ->middleware('permission:vehiculos.create');

    Route::get('vehiculos', 'VehiculoController@index')->name('vehiculos.index')
            ->middleware('permission:vehiculos.index');

    Route::get('vehiculos/listar', 'VehiculoController@listar')->name('vehiculos.listar')
            ->middleware('permission:vehiculos.index');

    Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create')
            ->middleware('permission:vehiculos.create');

    Route::put('vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update')
            ->middleware('permission:vehiculos.edit');

    Route::get('vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show')
            ->middleware('permission:vehiculos.show');

    Route::post('vehiculos/disable', 'VehiculoController@disable')->name('vehiculos.disable')
            ->middleware('permission:vehiculos.status');
    Route::post('vehiculos/enable', 'VehiculoController@enable')->name('vehiculos.enable')
            ->middleware('permission:vehiculos.status');

    Route::get('vehiculos/{vehiculo}/edit', 'VehiculoController@edit')->name('vehiculos.edit')
            ->middleware('permission:vehiculos.edit');

    // USUARIOS
    Route::post('users/store', 'UserController@store')->name('users.store')
            ->middleware('permission:users.create');

    Route::get('users', 'UserController@index')->name('users.index')
            ->middleware('permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
            ->middleware('permission:users.create');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
            ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
            ->middleware('permission:users.show');

    Route::post('users/disable', 'UserController@disable')->name('users.disable')
            ->middleware('permission:users.status');
    Route::post('users/enable', 'UserController@enable')->name('users.enable')
            ->middleware('permission:users.status');


    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');


    // REGISTRAR
    Route::post('registro/store', 'RegistroController@store')->name('registro.store')
            ->middleware('permission:registros.index');

    Route::get('registro', 'RegistroController@index')->name('registro.index')
            ->middleware('permission:registros.index');

    Route::post('registro/buscar', 'RegistroController@find')->name('registro.find')
            ->middleware('permission:registros.index');

    Route::post('registro/validar', 'RegistroController@validarTercero')->name('registro.validarTercero')
            ->middleware('permission:registros.tercero');
            Route::post('registro/validar/{codigo}', 'RegistroController@validarTercero')->name('registro.validarTercero2')
                    ->middleware('permission:registros.tercero');

    Route::post('terceros/generate', 'RegistroController@crearCodigoTercero')->name('registro.crearCodigoTercero')
            ->middleware('permission:registros.tercero');

    Route::get('terceros/generate', 'RegistroController@terceroIndex')->name('registro.crearCodigoTercero')
            ->middleware('permission:registros.tercero');

    Route::post('terceros', 'RegistroController@findDueno')->name('registro.findDueno')
            ->middleware('permission:registros.tercero');

    /* Solo podran ver los datos, aquellos con permisos de listar los dueños */
    Route::get('autocompleteRunDueno', 'RegistroController@searchDueno')->name('registro.autocompleteRunDueno')
            ->middleware('permission:duenos.index');
});
