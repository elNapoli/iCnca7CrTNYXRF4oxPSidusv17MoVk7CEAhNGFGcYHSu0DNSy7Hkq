<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'universidades'=>'UniversidadesController',
	'continentes'=>'ContinentesController',
]);

Route::group(['prefix'=>'admin'],function(){

	//Route::resource('users','UsersController');
	Route::resource('usuarios','UsuariosController');

});



Route::group(['prefix'=>'paises'],function(){

	Route::get('/',array('uses' => 'PaisesController@index', 'as'=>'paises.index'));
	Route::get('create',array('uses' => 'PaisesController@create', 'as'=>'paises.create'));
	Route::post('store',array('uses' => 'PaisesController@store', 'as'=>'paises.store'));
	Route::get('edit/{id}',array('uses' => 'PaisesController@edit', 'as' => 'paises.edit'));
	Route::put('update/{id}',array('uses' => 'PaisesController@update', 'as' => 'paises.update'));
	Route::delete('destroy/{id}',array('uses' => 'PaisesController@destroy', 'as'=> 'paises.destroy'));
		



});



Route::group(['prefix'=>'ciudades'],function(){

	Route::get('/',array('uses' => 'CiudadesController@index', 'as'=>'ciudades.index'));
	Route::get('create',array('uses' => 'CiudadesController@create', 'as'=>'ciudades.create'));
	Route::post('store',array('uses' => 'CiudadesController@store', 'as'=>'ciudades.store'));
	Route::get('edit/{id}',array('uses' => 'CiudadesController@edit', 'as' => 'ciudades.edit'));
	Route::put('update/{id}',array('uses' => 'CiudadesController@update', 'as' => 'ciudades.update'));
	Route::delete('destroy/{id}',array('uses' => 'CiudadesController@destroy', 'as'=> 'ciudades.destroy'));
	Route::get('getPais',array('uses' => 'CiudadesController@getPais', 'as'=> 'ciudades.getPais'));
	Route::get('hola',array('uses' => 'CiudadesController@hola', 'as'=> 'ciudades.hola'));

		



});
