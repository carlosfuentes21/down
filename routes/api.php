<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS PARA LA GESTION DE ASIGNATURAS
Route::post('/asignatura', 'AsignaturaController@store')->name('asignaturaGuardar');
Route::get('/asignatura', 'AsignaturaController@index')->name('asignaturaListar');
Route::delete('/asignatura/{id}', 'AsignaturaController@destroy')->name('asignaturaEliminar');
Route::put('/asignatura/{id}', 'AsignaturaController@update')->name('asignaturaActualizar');
