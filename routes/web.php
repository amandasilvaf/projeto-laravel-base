<?php

use Illuminate\Http\Request;
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

// Rota com parâmetros. Os parâmetros serão atribuídos respectivamente na função.
Route:: get('/ola/{nome}/{sobrenome}', function($nome1, $lastname){
    return "Olá, {$nome1} {$lastname}";
});

// Rota com parâmetro(s) opcional(ais)
// nesse caso, o que torna o parâmetro opcional é o "?", e devo iniciar a variável como nula, na função
Route::get('/seunome/{nome?}', function($nome=null) {
    if(isset($nome)){
        return "Olá, {$nome}";
    }
    return "Você não digitou nenhum nome (parâmetro opcional).";
});

// Rota com regras
// Regras: $nome = letras e $n = int. 
// Expressões regulares.
Route::get('rotacomregras/{nome}/{n}', function($nome, $n) {
    for($i=0; $i<$n; $i++)
        echo "Olá, {$nome}. <br>";
})->where('nome', '[A-Za-z]+')
  ->where('n', '[0-9]+');  

// Agrupando rotas
Route::prefix('/app')->group(function(){
    
    Route::get('/', function() {
        return view('app');
    })->name('app');

    Route::get('/user', function() {
        return view('user');
    })->name('app.user');

    Route::get('/profile', function() {
        return view('profile');
    })->name('app.profile');
    
});

// Nomeando as rotas
Route::get('/produtos', function() {
    return view('produtos');
})->name('meusprodutos');

// Redirecionando Requisições
// ('de onde veio', 'pra onde vai', 301?? )
Route::redirect('todosprodutos1', 'meusprodutos', 301);

// Agora redirecionando de maneira parecida com o que irá acontecer qnd utilizar controllers
Route::get('todosprodutos2', function() {
    return redirect()->route('meusprodutos');
});

// MÉTODOS DE REQUISIÇÕES HTTP //

// GET - para 'pegar'
Route::get('/requisicoes', function(Request $req) {
    return 'Hello, GET!';
});

// POST - para enviar
Route::post('/requisicoes', function(Request $req) {
    return 'Hello, POST!';
});

// DELETE - para deletar
Route::delete('/requisicoes', function(Request $req) {
    return 'Hello, DELETE!';
});

// PUT - para salvar
Route::put('/requisicoes', function(Request $req) {
    return 'Hello, PUT!';
});

// PATCH - para salvar, também
Route::patch('/requisicoes', function(Request $req) {
    return 'Hello, PATCH!';
});

// OPTIONS
Route::options('/requisicoes', function(Request $req) {
    return 'Hello, OPTIONS!';
});

// ('url', 'Controller@Método')
Route::get('oi', 'App\Http\Controllers\MeuControlador@intro');
Route::get('nome', 'App\Http\Controllers\MeuControlador@getNome');
Route::get('idade', 'App\Http\Controllers\MeuControlador@getIdade');
Route::get('multiplicar/{n1}/{n2}', 'App\Http\Controllers\MeuControlador@multiplicar');

// Chamando todos os métodos do controlador de uma vez só,
// utilizando o resource (mesmo atributo usado para criar o controllador).
// php artisan make:controller ClienteControlador --resource
Route::resource('clientes', 'App\Http\Controllers\ClienteControlador');

