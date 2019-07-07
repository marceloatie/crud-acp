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
    return view('bemVindo');
});

//Professor
//Route::resource('professor', 'ProfessorController');
Route::get('/professor', 'ProfessorController@index');
Route::get('/professor/novo', 'ProfessorController@novo');
Route::post('/professor/insert', 'ProfessorController@insert');
Route::get('/professor/editar/{id}', 'ProfessorController@editar');
Route::post('/professor/update/{id}', 'ProfessorController@update');
Route::get('/professor/delete/{id}', 'ProfessorController@delete');

//Curso
//Route::resource('curso', 'CursoController');
Route::get('/curso', 'CursoController@index');
Route::get('/curso/novo', 'CursoController@novo');
Route::post('/curso/insert', 'CursoController@insert');
Route::get('/curso/editar/{id}', 'CursoController@editar');
Route::post('/curso/update/{id}', 'CursoController@update');
Route::get('/curso/delete/{id}', 'CursoController@delete');

//Aluno
//Route::resource('curso', 'CursoController');
Route::get('/aluno', 'AlunoController@index');
Route::get('/aluno/novo', 'AlunoController@novo');
Route::post('/aluno/insert', 'AlunoController@insert');
Route::get('/aluno/editar/{id}', 'AlunoController@editar');
Route::post('/aluno/update/{id}', 'AlunoController@update');
Route::get('/aluno/delete/{id}', 'AlunoController@delete');

Route::get('/aluno/ajaxcep/{cep}', 'AlunoController@ajaxCep');

//Relatorio
Route::get('/relatorio', 'RelatorioController@index');