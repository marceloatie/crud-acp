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
Route::any('/professor', 'ProfessorController@index');
Route::any('/professor/novo', 'ProfessorController@novo');
Route::any('/professor/insert', 'ProfessorController@insert');
Route::any('/professor/editar/{id}', 'ProfessorController@editar');
Route::any('/professor/update/{id}', 'ProfessorController@update');
Route::any('/professor/delete/{id}', 'ProfessorController@delete');

//Curso
//Route::resource('curso', 'CursoController');
Route::any('/curso', 'CursoController@index');
Route::any('/curso/novo', 'CursoController@novo');
Route::any('/curso/insert', 'CursoController@insert');
Route::any('/curso/editar/{id}', 'CursoController@editar');
Route::any('/curso/update/{id}', 'CursoController@update');
Route::any('/curso/delete/{id}', 'CursoController@delete');

//Aluno
//Route::resource('curso', 'CursoController');
Route::any('/aluno', 'AlunoController@index');
Route::any('/aluno/novo', 'AlunoController@novo');
Route::any('/aluno/insert', 'AlunoController@insert');
Route::any('/aluno/editar/{id}', 'AlunoController@editar');
Route::any('/aluno/update/{id}', 'AlunoController@update');
Route::any('/aluno/delete/{id}', 'AlunoController@delete');
Route::any('/aluno/ajaxcep/{cep}', 'AlunoController@ajaxCep');

//Relatorio
Route::any('/relatorio', 'RelatorioController@index');