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

/*
RUTAS PÚBLICAS
*/
// Autenticación por medio de redes sociales
// Route::get('/auth/facebook', 'SocialAuthController@facebook');
// Route::get('/auth/facebook/callback', 'SocialAuthController@facebookCallback');

// Route::get('/auth/google','SocialAuthController@google');
// Route::get('/auth/google/callback','SocialAuthController@googleCallback');

Route::get('/auth/{provider}', 'SocialAuthController@redirect');
Route::get('/auth/{provider}/callback', 'SocialAuthController@callback');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/*
    Grupo de rutas las cuales requieren de autenticación
*/
Route::middleware(['auth'])->group(function(){
    //Roles
    //el método middleware  buscará si el nombre existe, es decir, va a buscar en el app/Http/Kernel.php
    //en el arreglo de $routeMiddleware si CAN existe, en caso de que exista ejecutará a la clase.
    Route::post('roles/store','RoleController@store')->name('roles.store')->middleware('can:roles.create');
    Route::get('roles','RoleController@index')->name('roles.index')->middleware('can:roles.index');
    Route::get('roles/create','RoleController@create')->name('roles.create')->middleware('can:roles.create');
    Route::put('roles/{role}','RoleController@update')->name('roles.update')->middleware('can:roles.edit');
    Route::get('roles/{role}','RoleController@show')->name('roles.show')->middleware('can:roles.show');
    Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')->middleware('can:roles.destroy');
    Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')->middleware('can:roles.edit');
    //Publications
    Route::post('publications/store','PublicationController@store')->name('publications.store')->middleware('can:publications.create');
    Route::get('publications','PublicationController@index')->name('publications.index')->middleware('can:publications.index');
    Route::get('publications/create','PublicationController@create')->name('publications.create')->middleware('can:publications.create');
    Route::put('publications/{publication}','PublicationController@update')->name('publications.update')->middleware('can:publications.edit');
    Route::get('publications/{publication}','PublicationController@show')->name('publications.show')->middleware('can:publications.show');
    Route::delete('publications/{publication}','PublicationController@destroy')->name('publications.destroy')->middleware('can:publications.destroy');
    Route::get('publications/{publication}/edit','PublicationController@edit')->name('publications.edit')->middleware('can:publications.edit');
    //Users
    Route::get('users','UserController@index')->name('users.index')->middleware('can:users.index');
    Route::put('users/{user}','UserController@update')->name('users.update')->middleware('can:users.edit');
    Route::get('users/{user}','UserController@show')->name('users.show')->middleware('can:users.show');
    Route::delete('users/{user}','UserController@destroy')->name('users.destroy')->middleware('can:users.destroy');
    Route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('can:users.edit');
});
