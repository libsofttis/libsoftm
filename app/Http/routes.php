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

Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/areas', 'AreaController');
	Route::get('/areaNueva', 'AreaController@create');

	Route::resource('/proyectos','ProyectoController');

	Route::get('/home', 'HomeController@index');

	//Route::post('/edit', 'ProyectoController@update');talvez innecesario

	
	Route::get('/create', 'ProyectoController@create');
	Route::post('/create', 'ProyectoController@store');
	
	

	Route::resource('/proyectos', 'ProyectoController');
	Route::get('/proyectos/{id}', 'ProyectoController@show');

	Route::get('/proyecto/detalle/{id}', 'ProyectoController@detalles');
   
	
	
	Route::get('proyectos/edit/{id}', 'ProyectoController@edit');
	//Route::get('/proyectos', 'ProyectoController@edit'); talvez innecesario
	//Route::post('proyectos/edit/{id}', 'ProyectoController@update');
	
	
	
	
	Route::resource('/proyectos','ProyectoController');
	Route::post('/proyectos/create', 'ProyectoController@edit');

	

	Route::resource('/estudiante', 'EstudianteController');

	//Route::resource('/tutorproyecto', 'DocenteController@create_sub');
	Route::get('/proyecto_est', 'EstudianteController@proyc_est');
	Route::resource('/proyecto_estudiante', 'Proyecto_estudianteController');
	//Route::resource('/estudianteproyecto', 'DocenteController@create_sub');
	Route::get('/estudiante/{id}/proyecto', 'ProyectoController@proyectoEstudiante');
	Route::get('/estudiante/proyecto/{id}/tribunales', 'ProyectoController@posiblesTribunales');
	Route::get('/estudiante/proyecto/{id}/renuncia', 'ProyectoController@renunciaTribunales');
	Route::post('/estudiante/proyecto/defensa', 'ProyectoController@defensa');
	Route::get('/estudiante/proyecto/{idProy}/{idDoc}/asignacion', 'ProyectoController@asignarTribunal');
	Route::post('/estudiante/proyecto/renuncia', 'ProyectoController@renunciaTribunal');

	Route::get('/reporteInactivo', 'ProyectoController@reporteInactivo');
	Route::get('/reporteActivo', 'ProyectoController@reporteActivo');
	//Route::get('/reporteCancelado', 'ProyectoController@reporteCancelado');
	

	Route::resource('/tribunales', 'AsignacionController');

	Route::get('/tribunales/asignacion', 'AsignacionController@asignacion');

	Route::resource('/docentes', 'DocenteController');
	Route::get('/docenteNuevo', 'DocenteController@create');
	Route::resource('/email', 'EmailController');

	Route::get('/reporteGeneral', 'ProyectoController@reporteGeneral');
	//ruta de abajo creado por mi 
	
	Route::get('/reporteGeneralFecha', 'ProyectoController@reporteGeneralFecha');
    
	
   
Route::get('carreras/create', 'CarreraController@create');
  //Route::resource('/carreras', 'CarreraController');
  Route::post('/carreras','CarreraController@store');
    //Route::get('/CarreraNuevo', 'CarreraController@create');
    // hacia abajo borra
	Route::get('/carreras', 'CarreraController@index');
	

	


});
