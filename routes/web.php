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

// AUTENTICACION
//desactivar el registro y el reseteo de la contraseña
Auth::routes([
    'reset'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');
