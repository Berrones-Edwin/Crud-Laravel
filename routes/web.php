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
    return view('auth.login');
});



// Route::get('empleados','EmpleadosController@index');
// Route::resource('empleados','Ejemplo3Controller');
Route::resource('empleados','EmpleadosController')->middleware('auth');

// Route::resource('empleados','EmpleadosController')->middleware('auth');

// NOTIFICACIONES
Route::get('notificaciones','NotificationsController@index')->name('notifications.index')->middleware('auth');
Route::get('notificaciones/crear','NotificationsController@create')->name('notifications.create')->middleware('auth');
Route::post('notificaciones','NotificationsController@store')->name('notifications.store')->middleware('auth');
Route::put('notificaciones/{id}','NotificationsController@update')->name('notifications.update')->middleware('auth');
Route::delete('notificaciones/{id}','NotificationsController@destroy')->name('notifications.destroy')->middleware('auth');




// AUTENTICACION
//desactivar el registro y el reseteo de la contraseña
Auth::routes([
    'reset'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');
