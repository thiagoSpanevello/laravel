<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//rotas Vendas

	//cadastrar
	Route::get('vendas/cad', 'VendaController@create')->name("vendas.create");

	//listar
	Route::get('vendas/lista', 'VendasController@listar')->name("vendas.listar");


	//rotas Produto

	//cadastrar
	Route::get('produto/novo', 'ProdutoController@create')->name("produto.create");
	Route::post('produto', 'ProdutoController@store')->name('produto.store'); 

	//listar e deletar
	Route::get('produto/lista', 'ProdutoController@listar')->name("produto.listar");
	Route::get('produto/grafico', 'ProdutoController@grafico')->name("produto.grafico");
	Route::delete('produto/{produto}', 'ProdutoController@destroy')->name("produto.deletar");

	//editar
	Route::put('produto/{produto}', 'ProdutoController@update')->name("produto.update");
	Route::get('produto/edit/{produto}', 'ProdutoController@edit')->name("produto.edit");
	
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
