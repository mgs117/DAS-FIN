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

//Login
Route::get('/', function () {
    return view('auth/login');
});

//2FA
Route::post('/login-two-factor/{user}', 'Auth\LoginController@login2FA')->name('login.2fa');

Auth::routes(['register'=>false]);

//Ruta para acceder al menú según el rol
Route::get('/home', 'HomeController@index');

//Rutas a las que puede acceder el administrador
Route::group(['middleware' => 'MiddlewareAdministrador'],function(){
  Route::resource('usuarios', 'UsuarioController');
  Route::resource('pacientes', 'PacienteController');
  Route::resource('historiales', 'HistorialController');
  Route::resource('especialidades', 'EspecialidadController');
});

//Rutas a las que pueden acceder los administrativos
Route::group(['middleware' => 'MiddlewareAdministrativo'],function(){
  Route::resource('citas', 'CitaController');
  Route::get('listapacientes', 'PacienteController@mostrar');
});

//Rutas a las que pueden acceder los médicos
Route::group(['middleware' => 'MiddlewareMedico'],function(){
  Route::get('miscitas', 'CitaController@miscitas');
  Route::get('mishistoriales', 'HistorialController@mishistoriales');
  Route::get('mispacientes', 'PacienteController@mispacientes');
});

