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

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
            ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
            ->middleware('permission:roles.edit');

   // DUEÑOS
            
    Route::get('duenos', 'DuenoController@index')->name('duenos.index')
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

    Route::get('vehiculos/create', 'VehiculoController@create')->name('vehiculos.create')
            ->middleware('permission:vehiculos.create');

    Route::put('vehiculos/{vehiculo}', 'VehiculoController@update')->name('vehiculos.update')
            ->middleware('permission:vehiculos.edit');

    Route::get('vehiculos/{vehiculo}', 'VehiculoController@show')->name('vehiculos.show')
            ->middleware('permission:vehiculos.show');

    Route::delete('vehiculos/{vehiculo}', 'VehiculoController@destroy')->name('vehiculos.destroy')
            ->middleware('permission:vehiculos.destroy');

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

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
            ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('permission:users.edit');
            
});