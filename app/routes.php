<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@get_inicio');

Route::get('/test/{id}', 'AuthController@get_test_felder');


Route::get('login', 'AuthController@get_login');
Route::post('login', 'AuthController@post_login');
Route::get('logout', 'AuthController@get_logout');


Route::get('/registro', 'AuthController@get_registro_datos');
Route::post('/registro', 'AuthController@post_completar_registro');
Route::post('/registro', 'AuthController@post_registro_datos_personales');


Route::group(['before' => 'auth'], function()
{
    Route::get('/cursos', 'CursoController@get_cursos'); // listo

    Route::get('/cursos/{id}', 'CursoController@get_curso_id');

    Route::get('/unidad/{id}', 'UnidadController@get_unidad_id');

    Route::get('/tema/{id}', 'TemaController@get_tema_id');

    Route::get('/leccion/{id}', 'LeccionController@get_leccion_id');
});









//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++//


// RUTAS PARA PRUEBAS DE LA BASE DE DATOS


Route::get('testdb', function(){

    // $estilo = new EstiloAprendizaje;
    // $estilo->nombre_estilo_aprendizaje = 'estilo rcn';
    // $estilo->save();

    $usuario1 = new Usuario();

    $usuario1->nombre_usuario = "user";
    $usuario1->apellido_usuario = "Prueba";
    $usuario1->email = "testxx@example.com";
    $usuario1->password = Hash::make("testxx");
    $usuario1->id_estilo_aprendizaje = 9;
    $usuario1->save();

});


Route::get('listTestdb', function(){

   $usuario = Usuario::find(1);

   $usuarios = DB::table('usuarios')
                ->join('estilos_aprendizaje', 'usuarios.id_estilo_aprendizaje', '=', 'estilos_aprendizaje.id')
                ->get();


    $estilo = $usuario->estilo->nombre_estilo_aprendizaje;


    print_r($estilo);
});


