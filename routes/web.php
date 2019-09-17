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
//Rota responsável chamar a tela inicial
Route::get('/index',"PagesController@index");

//Rota responsável chamar a tela inicial
Route::get('/responder',"PagesController@responderQuiz");

//Rota responsável por lista os Usuários
Route::get('/users', 'UserController@listUsers');

//Rota responsável capturar os dados de 1 Usuário
Route::get('/users/dados/{id}', 'UserController@mostrar');

//Rota responsável cadastrar um usuário
Route::get('/cadUser',"UserController@cadastrar");

//Rota responsável logar um usuário
Route::get('/login',"UserController@login");