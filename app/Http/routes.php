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
Route::get('/setLang', 'WelcomeController@setLang');
Route::get('profile', 'UsuariosController@profile');
Route::post('change-password', 'UsuariosController@changePassword');
Route::post('update-profile', 'UsuariosController@updateProfile');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'universidades'=>'UniversidadesController',
	'continentes'=>'ContinentesController',
	'paises' => 'PaisesController',
	'ciudades' => 'CiudadesController',
	'facultades' => 'FacultadesController',
	'beneficios' => 'BeneficiosController',
	'postulacion' => 'PostulacionController',
	'asistentes' => 'AsistentesController',
	'estudo-actual' => 'EstudioActualController',
	'departamentos' => 'DepartamentosController',
	'detalles' => 'DetalleBeneficioController',
	'asignaturas' => 'AsignaturasController',
	'documentos-identidad' => 'DocumentoIdentidadController',
	'alojamientos' => 'AlojamientosController',
	'noticias' => 'NoticiasController',
	'estadisticas' => 'EstadisticasController',

	'prepostulacionuniversidad' => 'PrePostulacionUniversidadController',
	'carreras' => 'CarrerasController',
	'financiamientos' => 'FinanciamientoController',

	'pdf' => 'PdfController',
	'docs' => 'DocumentosPostulacionController',
	'home'=>'HomeController',

	'declaracion' => 'DeclaracionController',
	'homologacion' => 'CursosHomologadosController',
	'confirmacion-llegada' => 'ConfirmacionLlegadaController',
	'representante-uach' => 'RepresentanteUachController',
	'contacto-en-extranjero' => 'ContactoEnExtranjeroController',
	'solicitud-curso' => 'SolicitudCursoController',
	'cursos-no-uach' => 'CursosNoUachController',
	'inscripcion-cursos' => 'InscripcionCursosController',

	'admin' => 'Admin\UsuariosController',
	'internet' => 'InternetController',

	'testimonios' => 'TestimonioController',
	'subir-archivos' => 'DocumentosAdjuntosController',



]);

/*Route::group(['prefix'=>'admin', 'middleware' => ['auth','is_admin'], 'namespace' => 'Admin'],function(){
	//Route::get('homeAdmin', 'HomeAdminController@index');

	//Route::resource('users','UsersController');
	Route::get('user', 'UsuariosController@getUser');
	Route::get('edit', 'UsuariosController@postEdit');
	Route::resource('usuarios','UsuariosController');

}); */

Route::group(['prefix'=>'usr', 'namespace' => 'Usuarios'],function(){
	Route::get('register/verify/{confirmationCode}', 'RegistrationController@confirm'); // vincula el enlace de verificacion
	Route::get('verificado','RegistrationController@getVeryfied');
	Route::get('portaluser', 'UsuariosController@getPortaluser');
	//Route::resource('users','UsersController');
	Route::resource('usuarios','UsuariosController');

});