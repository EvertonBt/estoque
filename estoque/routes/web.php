<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', function()
{
return "<h1> Primeira lógica com Laravel </h1>";
});


Route::get("/produtos", "ProdutoController@lista");

Route::get("/produtos/mostra/{id}", "ProdutoController@mostra")->where('id', '[0-9]+');
	
Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/download', 'ProdutoController@download');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/home', 'HomeController@index');

Route::get('/novo_login', 'AutenticaController@login');

/*
Tipos de rotas: Get, Post, Any (aceita tudo) o put (para atualização) e o delete (remoção)
e match: passa um array com os métodos suportados ex. Route::match(array(GET, POST), '/produto/adiciona', 'ProdutoController@adiciona);

*/


Auth::routes();

Route::get('/home', 'HomeController@index');
