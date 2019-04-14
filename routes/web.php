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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ROUTES

// Envolvemos todas las rutas ya que se requiere utenticación 
Route::middelware(['auth'])->group(function(){
    
    /*
    ->middelware('permission:roles.create');
        permission hace referencia a /app/Http/Kernel.php 
        $routeMiddleware = [ 
        'permission' =>\Caffeinated\Shinobi\Middleware\UserHasPermission::class
        ]
    */

    // ROLES
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
            ->middelware('permission:roles.create');
            
    Route::get('roles', 'RoleController@index')->name('roles.index')
            ->middelware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
            ->middelware('permission:roles.create');

    Route::put('roles/update', 'RoleController@update')->name('roles.update')
            ->middelware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
            ->middelware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
            ->middelware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
            ->middelware('permission:roles.edit');

    // VEHICULOS
    Route::post('vehiculos/store', 'VehiculoController@store')->name('vehiculos.store')
            ->middelware('permission:vehiculos.create');
            
    Route::get('vehiculos', 'VehiculoController@index')->name('vehiculos.index')
            ->middelware('permission:vehiculos.index');

    Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create')
            ->middelware('permission:vehiculos.create');

    Route::put('vehiculos/update', 'VehiculoController@update')->name('vehiculos.update')
            ->middelware('permission:vehiculos.edit');

    Route::get('vehiculos/{role}', 'VehiculoController@show')->name('vehiculos.show')
            ->middelware('permission:vehiculos.show');

    Route::delete('vehiculos/{role}', 'VehiculoController@destroy')->name('vehiculos.destroy')
            ->middelware('permission:vehiculos.destroy');

    Route::get('vehiculos/{role}/edit', 'VehiculoController@edit')->name('vehiculos.edit')
            ->middelware('permission:vehiculos.edit');

    // USUARIOS
    Route::post('users/store', 'UserController@store')->name('users.store')
            ->middelware('permission:users.create');
            
    Route::get('users', 'UserController@index')->name('users.index')
            ->middelware('permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
            ->middelware('permission:users.create');

    Route::put('users/update', 'UserController@update')->name('users.update')
            ->middelware('permission:users.edit');

    Route::get('users/{role}', 'UserController@show')->name('users.show')
            ->middelware('permission:users.show');

    Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')
            ->middelware('permission:users.destroy');

    Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')
            ->middelware('permission:users.edit');
            
});